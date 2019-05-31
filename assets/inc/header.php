<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

  <title><?= $page_title; ?></title>
</head>
<body>

<?php if(isset($_SESSION['user'])): ?>

<header>
  <a href="home.php"><img class="logo" src="assets/images/logo.png" alt=""></a>

  <form action="" class="search">
      <input type="text" placeholder="Recherche avec des mots clefs ou tags">
      <button><img src="assets/images/search.svg" alt=""></button>
  </form>

  <nav class="navigation">
    <ul>
      <li class="navElement">
        <div class="navElement__question">
        <img src="assets/images/vector.png" alt="vector">
        <a href="post.php">Pose ta question</a>
        </div>
      </li>
      <li class="navElement">
        <a href="index.php?logout">Déconnexion</a>
      </li>
    </ul>
  </nav>

</header>

<?php  endif; ?>
