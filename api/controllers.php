<?php
namespace API\Controllers;

class User extends \API\Controller {
  function childConstructor(){
    $this->args_allowed = [
      'id' => null,
      'name' => null,
      'points' => null,
      'rank' => null,
      'department' => null,
      'role' => null,
      'member_since' => [
         'validate_function' => function ($date) {
            return parent::date_is_valid($date);
         }
      ],
      'rank_since' => [
         'validate_function' => function ($date) {
            return parent::date_is_valid($date);
         }
      ]
    ];
  }
}

class Week extends \API\Controller {
  protected $User;
  protected function childConstructor(){
    $this->User = new \API\Models\User($this->app, 'user');
    $this->args_allowed = [
      'uid' => null,
      'attendance' => [
        'validate_function' => function ($year_week) {
          return parent::year_week_is_valid($year_week);
        }
      ],
      'event' => [
        'validate_function' => function ($event) {
          return (array_key_exists($event, $this->Model->events));
        }
      ]
    ];
  }
  public function create($args){
    $result = parent::create($args);
    if (array_key_exists('success', $result)){
      $this->User->add_points($args['uid'], $this->Model->events[$args['event']]);
    }
      exit(json_encode($result));
  }
   
  public function update($args){
    \API\output\json_error('Function not implemented for this object');
  }
   
  public function delete($args){
    if ($args === false || count($args) !== 3) \API\output\json_error('All 3 parameters are required: uid,attendance and event');
    $result = parent::delete($args);
    exit(json_encode($result));
  }
}

class Rank extends \API\Controller {
  protected function childConstructor(){
    $this->args_allowed = [
      'id' => null,
      'level' => null,
      'name' => null,
      'abbreviation' => null,
      'points_required' => null,
      'days_required' => null
    ];
  }
}

class Department extends \API\Controller {
  protected function childConstructor(){
    $this->args_allowed = [
      'id' => null,
      'level' => null,
      'name' => null,
      'abbreviation' => null,
      'monthly' => null
    ];
  }
}

class Role extends \API\Controller {
  protected function childConstructor(){
    $this->args_allowed = [
    'id' => null,
      'level' => null,
      'name' => null,
      'abbreviation' => null,
      'monthly' => null
    ];
  }
}

?>