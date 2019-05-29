<?php

require './assets/config/bootstrap.php';


if (!isset($_SESSION['user'])) {
	header('Location: index.php');
}

$page_title = 'AfterClass - Question';

require './assets/inc/header.php';

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

<?php elseif(isset($_GET['id'])):
  $currentPost = $post->getOne($pdo, $_GET['id']);
  
  if (isset($_POST['comment_content'])){
    $comments->addComment($pdo);
  }
  
  ?>


	<article  class="post">
		<h2 class="postTitle"> <?= $currentPost['title']?> </h2>
		<p class="postContent"><?= htmlentities($currentPost['content']) ?></p>
		<h3 class="postAuthor" >Auteur: <?= $currentPost['author'] ?></h3>
    <h4 class="postDate" >Date  de publication: <?= $currentPost['date'] ?></h4>
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

  <form class="comment" action="post.php?id=<?= $currentPost['id']; ?>" method="post">
  
    <label for="comments">ajouter un commentaire</label>
    <input type="text" name="comment_content">
    <input type="submit">
  
  </form>
    
  </article>



<?php foreach ($comments->viewComments($pdo) as $comment) :?>

  <article class="post">
    <a href='post.php?id=<?=$comment["id"]?>'> <h2 class="postTitle"> <?= $comment['title']?> </h2> </a>
    <p class="postContent"><?= htmlentities($comment['content']) ?></p>
    <h3 class="postAuthor" >Auteur: <?= $comment['author'] ?></h3>
    <h4 class="postDate" >Date  de publication: <?= $comment['date'] ?></h4>
  </article>

 
<?php  endforeach; ?>

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
?>


<style>

.comment {

margin-top: 30px;

}

</style>