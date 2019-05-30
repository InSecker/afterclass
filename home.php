<?php
require 'assets/config/bootstrap.php';
$page_title = 'AfterClass';

if (!isset($_SESSION['user'])) {
  header('Location: index.php');
}
if(isset($_POST['send'])) {
	$post->addPost($pdo);
}

if (isset($_GET['tags']) && $_GET['tags'] == '') {
  header('Location: home.php');
}

include 'assets/inc/header.php';
?>

<?php

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

$checker = false;

foreach ($post->getALL($pdo) as $post): ?>

  <?php $checker = true; ?>

  <div class="categories">
    <form class="categoriesForm" action="home.php" method="get">

      <div class="tagSort">
				<?php foreach($tags->getAll($pdo) as $tag): ?>
          <input class="inputTagSort" type="radio" id="tag<?= $tag['id'] ?>"
                 name="tags" value="<?= $tag['id'] ?>" required>
          <label class="labelTagSort" for="tag<?= $tag['id'] ?>"><?= $tag['label'] ?></label>
          <br>
				<?php endforeach; ?>
      </div>

      <input class="tagSubmit" type="submit" value="Rechercher">

    </form>
  </div>

  <article  class="post">
    <a href='post.php?id=<?=$post["id"]?>'> <h2 class="postTitle"> <?= $post['title']?> </h2> </a>
    <a href="home.php?tags=<?= $post['tag']?>"><h3>Catégorie: <?= $tags->getOne($pdo, $post['tag']); ?></h3></a>
    <p class="postContent"><?= htmlentities($post['content']) ?></p>
      <h3 class="postAuthor" >Auteur: <?= $post['author'] ?></h3>
      <h3>Nombre de réponses: <?= $comments->count($pdo, $post['id']) ?></h3>
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

if (!$checker): ?>

<article class="noCat">

  <a href="home.php">Aucun question dans cette catégorie. Cliquer pour revenir.</a>

</article>


<?php endif;


include 'assets/inc/footer.php';
