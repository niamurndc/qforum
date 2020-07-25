<?php 

require_once 'db.php';

class Category extends Database{

  public $table = 'categories';

  public function getCategories(){
    $sql = "SELECT * FROM $this->table";
    $stmt = $this->squery($sql);
    $users = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    return $users;
  }

  public function getCategory($name){
    $sql = "SELECT * FROM $this->table WHERE cname = '$name'";
    $stmt = $this->squery($sql);
    $users = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    return $users;
  }

  public function createCat($cat, $desc){
    $sql = "INSERT INTO $this->table (cname, cdesc) VALUES ('$cat', '$desc')";
    $stmt = $this->squery($sql);
    if($stmt){
      header('location: index.php');
    }
  }

}