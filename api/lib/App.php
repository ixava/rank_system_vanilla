<?php
namespace API;
require_once 'Controller.php';
require_once(__DIR__ . '/../controllers.php');
require_once 'Model.php';
require_once(__DIR__ . '/../models.php');
require_once 'output.php';
require_once 'database.php';

class App {
  private $dataTarget, $customMethod, $args, $controller, $controllerPath, $modelPath;
  public $config;
  function __construct($config){
    $this->config = $config;
    $this->getCRUDAction();
    $this->validateCrudAction();
    $this->db = new Database\DatabaseHandle($this->config['DB']);
    $this->modelPath = '\\API\\Models\\' . ucfirst($this->dataTarget);
    $this->controllerPath = '\\API\\Controllers\\' . ucfirst($this->dataTarget);
    $this->args = $_GET;
    $this->loadController();
    $this->runRequest();
  }
  private function getCRUDAction(){
    $url_parameters = preg_split('/\//', $_SERVER['PATH_INFO'], -1, PREG_SPLIT_NO_EMPTY);
    // URL parameters should be like: url/<db_table>/<crud_method>?args={args:{}, options:{}}
    if (count($url_parameters) === 2){
      $this->dataTarget = strtolower($url_parameters[0]);
      $this->customMethod = strtolower($url_parameters[1]);
    }
    else{
        print_r($url_parameters);
      output\json_error("No path parameters for target & method were passed");
    }
  }
  private function validateCRUDAction(){
    switch ($this->customMethod) {
      case 'create':
      case 'read':
      case 'update':
      case 'delete':
        break;
      default:
        output\json_error("Invalid parameter for custom_method");
    }
  }
  private function loadController(){
    $this->controller = new $this->controllerPath($this, new $this->modelPath($this, $this->dataTarget));
  }
  private function runRequest(){
    $table_args = array_key_exists('args', $this->args) ? json_decode($this->args['args'], true) : [];
    $query_options = array_key_exists('options', $this->args) ? json_decode($this->args['options'], true) : [];
    exit(json_encode(call_user_func_array([$this->controller, $this->customMethod], [$table_args, $query_options])));
  }
}

?>