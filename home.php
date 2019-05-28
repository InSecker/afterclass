<?php

require 'assets/config/bootstrap.php';
$page_title = 'AfterClass';

include  'assets/inc/header.php';

if ( isset($_GET['logout']) ) {
	$user->disconnect();
}

?>

<div class="">
	<h1>Bienvenue sur AfterClass!</h1>

  <form action="home.php" method="post">
    <p>
      <label for="title">Titre</label>
      <input type="text" name="title">
    </p>
    <p>
      <label for="content">Message</label>
      <textarea name="content" id="content" cols="30" rows="10"></textarea>
    </p>
    <p>
      <label for="author">Auteur :</label>
      <input type="text" name="author">
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
foreach ($post->allPosts($pdo) as $post) :?>

  Titre : <?= $post['title']?> <a href="index.php?id=<?= $post['id']?>">[Effacer]</a><br>
  Message : <?= $post['content'] ?> <br>
  Auteur : <?= $post['author'] ?> <br><br>

<?php  endforeach;

include 'assets/inc/footer.php';
