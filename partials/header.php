<?php
 session_start();
  spl_autoload_register(function($class){
    require 'models/'. $class .'.php';
  });
  
  if(isset($_SESSION['username'] ) ){
    $suname = $_SESSION['username'];
  }else{
    $suname = null;
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
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">QForum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <?php if($suname != null ){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="create.php">Create Question</a>
            <a class="dropdown-item" href="addcat.php">Create Category</a>
          </div>
        </li>
        <a class="nav-link" href="profile.php"><?php echo $suname; ?></a>
      <?php } ?>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php if($suname == null){ ?>
      <a href="login.php" class="btn btn-success ml-2">Login</a>
      <a href="login.php" class="btn btn-success ml-2">SignUp</a>
    <?php }else{ ?>
      <a href="logout.php" class="btn btn-success ml-2">Loguot</a>
    <?php } ?>
  </div>
</nav>

<main role="main">