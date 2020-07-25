<?php 

require_once 'db.php';

class Comment extends Database{

  public $table = 'comments';

  public function getComments($id){
    $sql = "SELECT * FROM $this->table WHERE qid = '$id'";
    $stmt = $this->squery($sql);
    $comments = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    return $comments;
  }

  public function createComm($text, $uname, $qid){
    $sql = "INSERT INTO $this->table (text, uname, qid) VALUES ('$text', '$uname', '$qid')";
    $stmt = $this->squery($sql);
    
  }

}