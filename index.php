<?php
include('partials/header.php');

$categroies = new Category; 

$questions = new Question;
?>

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron bg-img">
    <div class="container text-center pt-5">
      <h1 class="display-3">Drop Question</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &plus;</a></p>
    </div>
  </div>

  <div class="container">
    <h3>Popular Categories</h3>
    <hr>
    <!-- Example row of columns -->
    <div class="row">
    <?php foreach ($categroies->getCategories() as  $cat){ ?>
      <div class="col-md-4">
        <h4><?php echo $cat['cname']; ?></h4>
        <p><?php $catdesc = $cat['cdesc']; echo substr($catdesc, 0, 80).'...'; ?></p>
        <p><a class="btn btn-secondary" href="category.php?name=<?php echo $cat['cname'] ?>" role="button">View details &raquo;</a></p>
      </div>
    <?php } ?>
    </div>

    <hr>

  </div> <!-- /container1 -->

  <div class="container">
    <h3>Latest Question</h3>
    <hr>
    <!-- Example media columns -->
    <?php foreach ($questions->getQuestions() as  $ques){ ?>
    <div class="media mb-3 qforum-block">
      <img src="img/logo.jpg" class="mr-3" alt="logo">
      <div class="media-body">
        <h5 class="mt-0"><?php echo $ques['uname'] ?></h5>
        <?php echo $ques['text'] ?> <a href="view.php?id=<?php echo $ques['id'] ?>">Read More</a>
      </div>
    </div>
    <?php } ?>
    <hr>
  </div> <!-- /container -->
  
<?php
include('partials/footer.php');
?>
