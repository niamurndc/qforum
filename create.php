<?php
include('partials/header.php');

if($suname == null){
  header('location: login.php');
}

$categroies = new Category; 

if(isset($_POST['submit'])){
  echo $name = $_POST['cat'];
  echo $desc = $_POST['ques'];

  $question = new Question;
  $question->createQues($name, $desc, $suname);
}
?>

<div class="container">
    <h3>Create Your Question</h3>
    <form method="post">
      <div class="form-group">
        <label for="cat">Select Category</label>
        <select name="cat" id="cat" class="form-control">
          <?php foreach ($categroies->getCategories() as  $cat){ ?>
            <option value="<?php echo $cat['cname'] ?>"><?php echo $cat['cname'] ?></option>
          <?php } ?>
        </select>
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