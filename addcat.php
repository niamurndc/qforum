<?php
include('partials/header.php');

if($suname == null){
  header('location: login.php');
}

$categroies = new Category; 

if(isset($_POST['submit'])){
  echo $name = $_POST['cname'];
  echo $desc = $_POST['ques'];

  $categroies->createCat($name, $desc);
}
?>

<div class="container">
    <h3>Create New Category</h3>
    <form method="post">
      <div class="form-group">
        <label for="cat">Category Name</label>
        <input type="text" name="cname" id="cat" class="form-control">
      </div>
      <div class="form-group">
        <label for="ques">Your Question</label>
        <textarea name="ques" id="ques" rows="10" class="form-control"></textarea>
      </div>
      <input type="submit" value="Submit" name="submit" class="btn btn-success mb-4">
      
    </form>
  </div>


<?php
include('partials/footer.php');
?>