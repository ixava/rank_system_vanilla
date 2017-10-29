<?php
namespace API;

class Model {
    public $db;
    public $table;
    public $events;
    public $columns;
    
    function __construct($app, $child) {
        $this->childConstructor();
        $this->app = $app;
        $this->db = $this->app->db;
        $this->table = $child;
        $this->events = $CONFIG['WEEK'];
    }
    
    public function getAll($options) {
        $limit_string = $this->db->create_limit_string($options);
        $stmt = $this->db->connection->prepare("SELECT * FROM {$this->table} {$limit_string}");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function update(array $args) {
        $update_string = $this->db->update_create_string($args, $skip_keys=['id']);
        $bind_array = $this->db->array_parameter_bind($args);
        $stmt = $this->db->connection->prepare("UPDATE {$this->table} SET {$update_string} WHERE id=:id");
        $stmt->execute($bind_array);
        return $stmt->rowCount();
    }
    public function get($args, $options) {
        $limit_string = $this->db->create_limit_string($options);
        $custom_values = $this->get_custom_values();
        $conditionals = $this->db->conditionals_create_string($args, [], $custom_values);
        $bind_array = $this->db->array_parameter_bind($args);
        
        $stmt = $this->db->connection->prepare("SELECT * FROM {$this->table} WHERE {$conditionals} {$limit_string}");
        $stmt->execute($bind_array);
        return $stmt->fetchAll();
    }
    public function delete($args) {
        $conditionals = $this->db->conditionals_create_string($args);
        $bind_array = $this->db->array_parameter_bind($args);
        
        $stmt = $this->db->connection->prepare("DELETE FROM {$this->table} WHERE {$conditionals}");
        $stmt->execute($bind_array);
        return $stmt->rowCount();
    }
    public function create($args) {
        $create_string = $this->db->create_create_string($args);
        $bind_array = $this->db->array_parameter_bind($args);
        
        $stmt = $this->db->connection->prepare("INSERT INTO {$this->table} {$create_string}");
        $stmt->execute($bind_array);
        return $stmt->rowCount();
    }

    // 
    // Functions to validate input format/types
 
    public function get_custom_values() {
        $custom_values = [];
        foreach (array_keys($this->columns) as $column) {
            if (array_key_exists('custom_query_value', $this->columns[$column])) {
                $custom_values[$column] = $this->columns[$column]['custom_query_value'];
            }
        }
        return $custom_values;
    }
}

?>