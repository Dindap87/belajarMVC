<?php
class User_model {
  private $table = 'users';
  private $db;

  private $name = 'rara';
  public function getUser() {
    return $this->name;
  }

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllUser() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function getUserById($id) {
    $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
    $this->db->bind('id', $id);
    return $this->db->resultSingle();
  }

  public function addUser($data) {
    $query = "INSERT INTO {$this->table} (email, username, password, first_name, last_name) VALUES (:email, :username, :password, :first_name, last_name)";
    $this->db->query($query);

    $this->db->bind(':email', $data['email']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':first_name', $data['firstname']);
    $this->db->bind(':last_name', $data['lastname']);

    return $this ->db->execute();
  }

}

?>