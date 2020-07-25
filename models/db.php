<?php

class Database{
  private $conn;
  public function __construct(){
    $this->conn = mysqli_connect('localhost', 'root', '', 'qforum');
  }

  protected function squery($sql){
    $query = mysqli_query($this->conn, $sql);
    return $query;
  }
}