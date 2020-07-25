<?php
include('partials/header.php');

$id = $_GET['id'];
$question = new Question;
$comment = new Comment;

if(isset($_POST['send'])){
  $comm = $_POST['comment'];
  
  $comment->createComm($comm, $suname, $id);
}
foreach($question->getQuestion($id) as $ques){
?>


<div class="container-fluid">
    <div class="row">
      <div class="col-md-9 mt-2">
        <div class="text-right">
          <a href="create.php" class="btn btn-success full-width mx-auto">Create Your Question &plus;</a>
        </div>
        <div class="media">
          <img src="img/logo.jpg" class="mr-3" alt="logo.jpg">
          <div class="media-body">
            <h5 class="mt-0"><?php echo $ques['uname']; ?></h5>
            <?php echo $ques['text']; ?>
            <!-- commment query star -->
            <?php
            $qid = $ques['id'];
            foreach($comment->getComments($qid) as $com){ ?>
            <div class="media mt-3 qforum-block">
              <a class="mr-1" href="#">
                <img src="img/logo.jpg" class="mr-1" alt="logo.jpg">
              </a>
              <div class="media-body">
                <h5 class="mt-0"><?php echo $com['uname']; ?></h5>
                <?php echo $com['text']; ?>
              </div>
            </div>
            <?php } if($suname == null ){ ?>
              <div class="qforum-block text-center">
                <p>You cann't answer without login.</p> <br>
                <a href="login.php" class="btn btn-success">Give Answer</a>
              </div>
            <!-- form for comment -->
            <?php }else{ ?>
              <div class="media mt-3 qforum-block">
                <a class="mr-2" href="#">
                  <img src="img/logo.jpg" class="mr-2" alt="logo.jpg">
                </a>
                <div class="media-body">
                  <form method="POST">
                    <textarea name="comment"  rows="3" class="form-control" placeholder="Give Answer"></textarea>
                    <input type="submit" value="Send" name="send" class="btn btn-success mt-2">
                  </form>
                </div>
              </div><!-- comment end -->
            
            <?php } ?>
            </div> 
        </div>
        <hr>
      </div>
      <div class="col-md-3 qforum-side pt-3">
        <h4>Random Question</h4>
        <ul class="list-group">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
          <li class="list-group-item">Porta ac consectetur ac</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="text-center">
          <a href="create.php" class="btn btn-success full-width mt-4 mx-auto">&plus; Create Your Question</a>
        </div>
        
      </div>
    </div>
  </div>



<?php
}
include('partials/footer.php');
?>