<?php
namespace API;

class Controller {
    protected $model, $app, $args_allowed;
    function __construct($app, $model){
      $this->app = $app;
      $this->childConstructor();
      $this->Model = $model;
    }
    public function create($args) {
      if (!self::args_check($args, $this->args_allowed) || count($args) < 1 || array_key_exists('id', $args)) {
         return self::array_return('error', 'Invalid args object supplied (format,names or values');
      }
      else{
         if ($this->Model->create($args) > 0) {
            return self::array_return('success', 'Record was successfully added');
         }
         else{
            return self::array_return('error', 'Failed to add record.');
         }
      }
    }
    public function update($args) {
        if (!self::args_check($args, $this->args_allowed) || count($args) < 2 || !array_key_exists('id', $args)) {
            return self::array_return('error','Invalid args object supplied (format,names or values');
      }
      else{
         if ($this->Model->update($args) > 0) {
            return self::array_return('success', 'Updated successfully.');
         }
         else{
            return self::array_return('error', 'Failed to update.');
         }
      }
    }
    public function read($args, $options=[]){
      if ($args === false || count($args) < 1){
         return self::array_return('success','Successfully retrieved all records', $this->Model->getAll($options));
      }
      elseif (!self::args_check($args, $this->args_allowed)){
         return self::array_return('error','Invalid args object supplied (format,names or values');
      }
      else {
         if (($result = $this->Model->get($args, $options)) > 0){
            return self::array_return('success', 'Successfully fetched record(s)', $result);
         }
         else{
            return self::array_return('error', 'Did not find any record for the given parameters.');
         }
      }
   }
   public function delete($args) {
      if (!self::args_check($args, $this->args_allowed)) {
         return self::array_return('error', 'Invalid args object supplied (format,names or values');
      }
      else {
         if ($this->Model->delete($args) > 0) {
            return self::array_return('success', 'Record was successfully deleted');
         }
         else{
           return self::array_return('error', 'Failed to delete record.');
         }
      }
   }
   private static function array_return($state="error", $msg='', $data=[]) {
        if (array_key_exists(0, $data)){
          $newData = array_reduce(
            $data, 
            function ($acc, $item){
              array_push($acc, $item);
              return $acc;
            },
            []
          );
        }
        elseif (count($data) > 0) $newData = [$data];
        else $newData = $data;
        return [$state => $msg, 'data' => $newData];
    }
   
   
    //   Helper functions:
    public static function year_week_is_valid($date) {
        return preg_match('/\d{4}-W\d{2}/', $date);
    }
    public static function date_is_valid($date) {
        return preg_match('/\d{4}-\d{2}-\d{2}/', $date);
    }
    public static function args_check($args, array $args_allowed) {
        if (!is_array($args) || count($args) < 1) {
            return false;
        }
        foreach (array_keys($args) as $key) {
            if (!array_key_exists($key, $args_allowed)) {
                return false;
            }
            elseif ($args_allowed[$key] !== null && array_key_exists('validate_function', $args_allowed[$key])){
                if (!$args_allowed[$key]['validate_function']($args[$key])) {
                    return false;
                }
            }
        }
        return true;
    }
    public static function array_keys_exist(array $keys, array $subject) {
        return (0 === count(array_reduce($keys, function ($acc, $key) use ($subject){
            if (array_key_exists($key, $subject)) return ++$acc;
            else return $acc;
        }), 0));
    }

}


?>