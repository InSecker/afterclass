<?php

  require './assets/config/bootstrap.php';

  // Redirect if not connected
  if (!isset($_SESSION['user'])) {
    header('Location: index.php');
  }


  // Update function
  if (isset($_POST['send'])) {
    $post->update($pdo, intval($_GET['id']));
  }

  $page_title = 'AfterClass - Question';
  require './assets/inc/header.php';

?>

<?php

  // Modify page
  if(isset($_GET['modify'])):

  $currentPost = $post->getOne($pdo, $_GET['id']);

  // Redirect to home if the user is not the author
  if ($currentPost['author'] !== $_SESSION['user']['username']) {
    header('Location: home.php');
  }


?>

  <!-- MODIFY  SECTION -->


  <article class="post">

    <form action="post.php?id=<?= $currentPost['id']; ?>" method="post">

      <label class="createLabel" for="title">Titre</label>
      <input class="createInput" type="text" name="title" value="<?= $currentPost['title']?>">

      <label class="createLabel" for="content">Message</label>
      <textarea class="createInput" name="content" id="content" cols="60" rows="10"><?= $currentPost['content']?></textarea>

      <input class="createSubmit" type="submit" name="send">

    </form>

    <form action="post.php?delete&id=<?= $currentPost['id']; ?>" method="post">
      <input class="createSubmit" type="submit" value="Supprimer">
      </form>



  </article>



<?php elseif(isset($_GET['id'])):

  $currentPost = $post->getOne($pdo, $_GET['id']);
  if ($currentPost['author'] === $_SESSION['user']['username'] && isset($_GET['delete'])) {
    $post->deletePost($pdo, $_GET['id']);
  }
  
  if (isset($_POST['comment_content'])){
    $comments->addComment($pdo);
  }

  if (isset($_GET['voteUp'])) {

    $vote->up($pdo, $_GET['idVote'], 'post');
  }

  if (isset($_GET['voteDown'])) {
    $vote->down($pdo, $_GET['idVote'], 'post');
  }
?>

  <!-- VIEW  SECTION -->


	<article  class="post">
  
    

    <a href="home.php?tags=<?= $currentPost['tag']?>"><h3 class= "post__categorie"> <?= $tags->getOne($pdo, $currentPost['tag']); ?></h3></a>
    <div class="container__likeAndAuthor">
    <h3 class="postAuthor" >Posté par <span class="author"><?= $currentPost['author'] ?></span> le <?= $currentPost['date'] ?></h3>
    <div class="likes-container">

    <div class="likes">
      <form action="post.php?voteUp&idVote=<?=$currentPost["id"]?>&id=<?= $currentPost['id']; ?>" method="post">
        <button type="submit" href=""><img src="./assets/images/up.svg" alt="up"></button>
      </form>
      <span class="likes-numbers"><?= $vote->count($pdo, $currentPost['id'], 'post')?></span>
      <form action="post.php?voteDown&idVote=<?=$currentPost["id"]?>&id=<?= $currentPost['id']; ?>" method="post">
        <button type="submit"><span class="likes-numbers"></span><img src="./assets/images/down.svg" alt="down"></button>
      </form>
    </div>

    </div>
    </div>

    <h3 class="question"><?= $currentPost['title']?></h3>
    <div class="post__question">
    <p class="postContent"><?= htmlentities($currentPost['content']) ?></p>
    </div>





		<?php
      if ($currentPost['author'] === $_SESSION['user']['username']) {
        echo "<a href='post.php?modify&id=" . $_GET["id"] . "'>[Modifier]</a><br>";
      }
    ?>

    <hr>

    <h3 class="titleReponse">Réponses</h3>

     <?php foreach ($comments->viewComments($pdo) as $comment) :?>

    <div class="comment">
    <h3 class="postAuthor" >Reponse de <span class="author"><?= $comment['author'] ?></span> le <?= $comment['date'] ?> </h3>
    <p class="postContentComment"><?= htmlentities($comment['content']) ?></p>
    </div>

  <?php  endforeach; ?>
    
  <h3 class="titleReponse">Proposer une réponse</h3>

  <form class="comment" action="post.php?id=<?= $currentPost['id']; ?>" method="post">
      <label for="comments">Proposer une réponse</label>
      <textarea class="createInput type="text" name="comment_content"cols="30" rows="10" ></textarea>
      <input class="addComment__subbmit" type="submit" value="Poste ta réponse">
  </form>


    <br><br>

  </article>


<?php else: ?>


  <!-- CREATE SECTION -->


  <article class="post">
    <h1>Écrire une question</h1>

    <form action="home.php" method="post">

    <div class="tags">
        <?php foreach($tags->getAll($pdo) as $tag): ?>
        <input type="radio" id="tag<?= $tag['id'] ?>"
               name="tags" value="<?= $tag['id'] ?>" required>
        <label for="tag<?= $tag['id'] ?>"><?= $tag['label'] ?></label>
        <?php endforeach; ?>
      </div>

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