<?php
require 'assets/config/bootstrap.php';
$page_title = 'AfterClass';

if (!isset($_SESSION['user'])) {
  header('Location: index.php');
}
if(isset($_POST['send'])) {
	$post->addPost($pdo);
}

include 'assets/inc/header.php';
?>

<?php

$post->deletePost($pdo);

if(isset($_SESSION['message'])) {?>
    <div class="container_alert">
        <?php $user->message->showAlert(); ?>
    </div>
<?php }

if (isset($_GET['voteUp'])) {

  $vote->up($pdo, $_GET['idVote'], 'post');
}

if (isset($_GET['voteDown'])) {
	$vote->down($pdo, $_GET['idVote'], 'post');
}

foreach ($post->getALL($pdo) as $post): ?>

  <article  class="post">
    <a href='post.php?id=<?=$post["id"]?>'> <h2 class="postTitle"> <?= $post['title']?> </h2> </a>
    <p class="postContent"><?= htmlentities($post['content']) ?></p>
      <h3 class="postAuthor" >Auteur: <?= $post['author'] ?></h3>
      <div class="likes-container">

          <div class="likes">
              <form action="home.php?voteUp&idVote=<?=$post["id"]?>" method="post">
                  <button type="submit" href=""><img src="./assets/images/up.svg" alt="up"></button>
              </form>
              <span class="likes-numbers"><?= $vote->count($pdo, $post['id'], 'post')?></span>
              <form action="home.php?voteDown&idVote=<?=$post["id"]?>" method="post">
                  <button type="submit"><span class="likes-numbers"></span><img src="./assets/images/down.svg" alt="down"></button>
              </form>
          </div>

      </div>
    <h4 class="postDate" >Date  de publication: <?= $post['date'] ?></h4>
  </article>


  <br>

<?php  endforeach;

include 'assets/inc/footer.php';
