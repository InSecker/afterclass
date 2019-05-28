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

	</article>

<?php else: ?>

<div>
	<h1>Écrire une question</h1>

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

<?php endif; ?>

<?php
require './assets/inc/footer.php';

