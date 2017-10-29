<?php
namespace API\Models;

class User extends \API\Model {
  protected function childConstructor(){
    $this->columns = [
      'id' => ['type' => 'numeric'],
      'name' => ['type' => 'string'],
      'points' => ['type' => 'numeric'],
      'rank' => ['type' => 'numeric'],
      'department' => ['type' => 'numeric'],
      'role' => ['type' => 'numeric'],
      'member_since' => ['type' => 'string'],
      'rank_since' => ['type' => 'string']
    ];
  }
  public function add_points($id, $add){
    $stmt = $this->db->connection->prepare("UPDATE user SET points=points+:points WHERE id=:id");
    $stmt->execute([':points' => $add, ':id' => $id]);
    return $stmt->rowCount();
  }
}

class Week extends \API\Model {
  protected function childConstructor(){
    $this->columns = [
      'id' => ['type' => 'numeric'],
      'uid' => ['type' => 'numeric'],
      'attendance' => [
      'type' => 'string',
      'custom_query_value' => "STR_TO_DATE(CONCAT(:attendance, ' Monday'), '%X-W%V %W')"
      ],
      'event' => ['type' => 'string'],
    ];
  }
}

class Rank extends \API\Model {
  protected function childConstructor(){
    $this->columns = [
      'id' => ['type' => 'numeric'],
      'level' => ['type' => 'numeric'],
      'name' => ['type' => 'string'],
      'abbreviation' => ['type' => 'string'],
      'points_required' => ['type' => 'numeric'],
      'days_required' => ['type' => 'numeric']
    ];
  }
}

class Department extends \API\Model {
  protected function childConstructor(){
    $this->columns = [
      'id' => ['type' => 'numeric'],
      'level' => ['type' => 'numeric'],
      'name' => ['type' => 'string'],
      'abbreviation' => ['type' => 'string'],
      'monthly' => ['type' => 'numeric']
    ];
  }
}

class Role extends \API\Model {
  protected function childConstructor(){
    $this->columns = [
      'id' => ['type' => 'numeric'],
      'level' => ['type' => 'numeric'],
      'name' => ['type' => 'string'],
      'abbreviation' => ['type' => 'string'],
      'monthly' => ['type' => 'numeric']
    ];
  }
}
?>