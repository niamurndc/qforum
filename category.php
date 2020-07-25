<?php
include('partials/header.php');

$name = $_GET['name'];
$question = new Question;
$category = new Category;
foreach($category->getCategory($name) as $cat){
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron bg-img-cat">
    <div class="container text-center ">
      <h1 class="display-3"><?php echo $catname = $cat['cname']; ?></h1>
      <p><?php echo $cat['cdesc']; ?></p>
    </div>
  </div>

  

  <div class="container">
    <h3>Questions</h3>
    <hr>
    <!-- Example media columns -->
    <?php $i = 0; foreach($question->getQuestionsAll($name) as $ques) {  $i++; ?>

      <div class="media mb-3 qforum-block">
        <img src="img/logo.jpg" class="mr-3" alt="logo">
        <div class="media-body">
          <h5 class="mt-0"><?php echo $ques['uname'];  ?></h5>
          <?php $qdesc = $ques['text']; echo substr($qdesc, 0, 300) ?><a href="view.php?id=<?php echo $ques['id'].'...'; ?>"> Read More</a>
        </div>
      </div>
    <?php } if($i == 0){
        echo '<div class="text-center">
                <p><strong>No question found in this category</strong></p>
                <a href="create.php" class="btn btn-success">Create new Question</a>
              </div>'; } ?>
    <hr>
  </div> <!-- /container -->


<?php
}
include('partials/footer.php');
?>