<?php 

require_once 'db.php';

class Question extends Database{

  public $table = 'questions';

  public function getQuestions(){
    $sql = "SELECT * FROM $this->table ORDER BY id desc limit 10";
    $stmt = $this->squery($sql);
    $questions = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    return $questions;
  }

  public function getQuestionsAll($name){
    $sql = "SELECT * FROM $this->table WHERE cname = '$name'";
    $stmt = $this->squery($sql);
    $questions = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    return $questions;
  }

  public function getQuestion($id){
    $sql = "SELECT * FROM $this->table WHERE id = '$id'";
    $stmt = $this->squery($sql);
    $questions = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    return $questions;
  }

  public function createQues($cat, $desc, $uname){
    $sql = "INSERT INTO $this->table (cname, text, uname) VALUES ('$cat', '$desc', '$uname')";
    $stmt = $this->squery($sql);
    if($stmt){
      header('location: index.php');
    }
  }

}