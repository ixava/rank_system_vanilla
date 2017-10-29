<?php
namespace API\Database;

class DatabaseHandle{
    public $connection;
    
    function __construct($CONFIG) {
        $this->connection = new \PDO("mysql:host=$CONFIG[HN];dbname=$CONFIG[DB]", $CONFIG['UN'], $CONFIG['PW']);
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
    protected function query_build_string($args, $format, $sep, $skip_keys=[], $custom_values=[], $start_string='') {
        return substr(
            array_reduce(array_keys($args), function($query, $key) use ($format, $sep, $start_string, $skip_keys, $custom_values) {
                if ($skip_keys != null && in_array($key, $skip_keys)) {
                    return $query;
                }
                $value = sprintf($format, $key);
                if ($custom_values != null && array_key_exists($key, $custom_values)) { 
                    return $query . preg_replace('/:' . $key . '/', $custom_values[$key], $value) . $sep;
                }
                else {
                    return "{$query}{$value}{$sep}";
                }
            }, $start_string),
        0, (strlen($sep) * -1));
    }
    
    public function conditionals_create_string($args, $skip_keys=[], $custom_values=[], $start_string='') {
        $sep = ' AND ';
        $format = '%1$s=:%1$s';
        return $this->query_build_string($args, $format , $sep , $skip_keys, $custom_values, $start_string);
    }
    public function update_create_string($args, $skip_keys=[], $custom_values=[]) {
        $sep = ',';
        $format = '%1$s=:%1$s';
        return $this->query_build_string($args, $format, $sep, $skip_keys, $custom_values);
    }
    public function create_create_string($args, $skip_keys=[], $custom_values=[]) {
        $sep = ',';
        $column_format = "%s";
        $value_format = ":%s";
        $columns = $this->query_build_string($args, $column_format, $sep, $skip_keys, $custom_values);
        $values = $this->query_build_string($args, $value_format, $sep, $skip_keys, $custom_values);
        return "({$columns}) VALUES ({$values})";
    }
    
    public function create_limit_string($options){
      $limit = 100;
      $offset = 0;
      if ($options != null){
        if (array_key_exists('limit', $options) && is_numeric($options['limit']) && $options['limit'] <= 100) {
          $limit = $options['limit'];
        }
        if (array_key_exists('offset', $options) && is_numeric($options['offset'])) {
          $offset = $options['offset'];    
        }
      }
      return "LIMIT {$offset},{$limit}";
    }
    
    // Convert parameter list into a valid parameter binding array to supply with PDO execute
    public function array_parameter_bind($array) {
        $return_array = array();
        array_walk($array, function($value, $key) use (&$return_array) {
            $return_array[":$key"] = $value;
        }); 
        return $return_array;
    }
    
}
    
?>