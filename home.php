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

// voir les posts

foreach ($post->getALL($pdo) as $post) :?>

  <article  class="post">
    <a href='post.php?id=<?=$post["id"]?>'> <h2 class="postTitle"> <?= $post['title']?> </h2> </a>
    <p class="postContent"><?= htmlentities($post['content']) ?></p>
    <h3 class="postAuthor" >Auteur: <?= $post['author'] ?></h3>
    <h4 class="postDate" >Date  de publication: <?= $post['date'] ?></h4>
  </article>


  <br>

<?php  endforeach;

include 'assets/inc/footer.php';
