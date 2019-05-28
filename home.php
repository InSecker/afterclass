<?php
require 'assets/config/bootstrap.php';

if (!isset($_SESSION['user'])) {
  header('Location: index.php');
}

$page_title = 'AfterClass';

include  'assets/inc/header.php';

?>

<div class="">
	<h1>Bienvenue sur AfterClass!</h1>

  <a href="index.php?logout">Déconnexion</a>

  <form action="home.php" method="post">
    <p>
      <label for="title">Titre</label>
      <input type="text" name="title">
    </p>
    <p>
      <label for="content">Message</label>
      <textarea name="content" id="content" cols="30" rows="10"></textarea>
    </p>
    <input type="submit" name="send">
  </form>

</div>

<?php

$post->deletePost($pdo);
if(isset($_POST['send'])) {
	$post->addPost();
}

// voir les posts
foreach ($post->getPost($pdo) as $post) :?>

  Titre : <?= $post['title']?> <a href="home.php?id=<?= $post['id']?>">[Effacer]</a><br>
  Message : <?= $post['content'] ?> <br>
  Auteur : <?= $post['author'] ?> <br>
  Date de publication : <?= $post['date'] ?> <br><br>

<?php  endforeach;

include 'assets/inc/footer.php';
