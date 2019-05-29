<?php

require './assets/config/bootstrap.php';
require './assets/inc/header.php';

$page_title = 'AfterClass - Question';

?>

<?php
	if(isset($_GET['id'])):

		$currentPost = $post->getOne($pdo, $_GET['id']);
	?>

	<article  class="post">
		<h2 class="postTitle"> <?= $currentPost['title']?> </h2>
		<p class="postContent"><?= htmlentities($currentPost['content']) ?></p>
		<h3 class="postAuthor" >Auteur: <?= $currentPost['author'] ?></h3>
		<h4 class="postDate" >Date  de publication: <?= $currentPost['date'] ?></h4>
		<?php

      if ($currentPostpost['author'] === $_SESSION['user']['username']) {
        echo "<a href='post.php?modify&id=" . $post["id"] . "'>[Modifier]</a><br>";
      }

		?>
	</article>

<?php else: ?>

<article class="post">
  <h1>Écrire une question</h1>

  <form action="home.php" method="post">

    <label class="createLabel" for="title">Titre</label>
    <input class="createInput" type="text" name="title">

    <label class="createLabel" for="content">Message</label>
    <textarea class="createInput" name="content" id="content" cols="30" rows="10"></textarea>

    <input class="createSubmit" type="submit" name="send">

  </form>

</article>


<?php endif; ?>

<?php
require './assets/inc/footer.php';

