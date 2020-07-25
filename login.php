<?php 
session_start();
require 'models/User.php';
$user = new User;

$msg = '';
if(isset($_POST['create'])){
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  if($name == '' || $username == '' || $email == '' || $pass == ''){
    $msg .= 'All Field Are required';
  }else{
    $result = $user->checkUser($username);
    if($result == 1){
      $msg .= 'Username Already Exist';
    }else{
      $user->createUser($name, $username, $email, $pass);
      $msg .= 'Profile Created. Now login.';
    }
  }
  //$user = new User;
  //$user->createUser($name, $username, $email, $pass);
}

if(isset($_POST['login'])){
  $name = $_POST['uname'];
  $pass = $_POST['pass'];

  if($name == '' || $pass == ''){
    $msg .= 'All Field Are required';
  }else{
    $result = $user->checkUserLogin($name, $pass);
    if($result == 0){
      $msg .= 'Wrong Username or password';
    }else{
      $_SESSION['username'] = $name;
      header('location: index.php');
    }
  }
  //$user = new User;
  //$user->createUser($name, $username, $email, $pass);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Niamur Rahman">
    <title>QForum | Drop Your Question</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">QForum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Username" name="uname">
      <input class="form-control mr-sm-2" type="password" placeholder="Password" name="pass">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login">Login</button>
    </form>
  </div>
</nav>

<main role="main">
  <div class="container">
    <div class="row">
      <div class="col-md-5 pt-3">
        <p class="alert-dange"><?php if($msg != ''){echo $msg; } ?></p>
        <h3>Create New Account</h3>
        <form method="post">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Emial</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
          </div>
          <input type="submit" value="Create" name="create" class="btn btn-success mb-3">
        </form>
      </div>
      <div class="col-md-7">
        <img src="img/login.jpg" alt="login" class="mt-3">
      </div>
    </div>
  </div>
</main>

<footer class="bg-dark text-light mb-0">
  <div class="container p-1">
    <p>&copy; QForum 2017-2020</p>
  </div>
  
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
