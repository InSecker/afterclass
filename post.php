<?php

require './assets/config/bootstrap.php';


if (!isset($_SESSION['user'])) {
	header('Location: index.php');
}

$page_title = 'AfterClass - Question';

require './assets/inc/header.php';


if (isset($_POST['send'])) {
	$post->update($pdo, intval($_GET['id']));
}

?>

<?php if(isset($_GET['modify'])):

	$currentPost = $post->getOne($pdo, $_GET['id']);


  if ($currentPost['author'] !== $_SESSION['user']['username']) {
    header('Location: home.php');
  }
  ?>

  <article class="post">
    <h1>Modifier</h1>

    <form action="post.php?id=<?= $currentPost['id']; ?>" method="post">

      <label class="createLabel" for="title">Titre</label>
      <input class="createInput" type="text" name="title" value="<?= $currentPost['title']?>">

      <label class="createLabel" for="content">Message</label>
      <textarea class="createInput" name="content" id="content" cols="30" rows="10"><?= $currentPost['content']?></textarea>

      <input class="createSubmit" type="submit" name="send">

    </form>

  </article>

<?php ?>


<?php elseif(isset($_GET['id'])):
	$currentPost = $post->getOne($pdo, $_GET['id']);
  ?>


	<article  class="post">
		<h2 class="postTitle"> <?= $currentPost['title']?> </h2>
		<p class="postContent"><?= htmlentities($currentPost['content']) ?></p>
        <h3 class="postAuthor" >Auteur: <?= $currentPost['author'] ?></h3>
        <div class="likes-container">
            <div class="likes">
                <a href=""><span class="likes-numbers">177</span><img src="./assets/images/up.svg" alt="up"></a>
                <a href=""><span class="likes-numbers">12</span><img src="./assets/images/down.svg" alt="down"></a>
            </div>
        </div>
        <div class="likes-container">

        </div>

		<h4 class="postDate" >Date  de publication: <?= $currentPost['date'] ?></h4>
		<?php

      if ($currentPost['author'] === $_SESSION['user']['username']) {

        echo "<a href='post.php?modify&id=" . $_GET["id"] . "'>[Modifier]</a><br>";
      }
		?>

    <form action="#"></form>
	</article>
  <section></section>

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

