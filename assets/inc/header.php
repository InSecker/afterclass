<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <title><?= $page_title; ?></title>
</head>
<body>

<?php if(isset($_SESSION['user'])): ?>

<header>
  <a href="home.php"><h1>Bienvenue sur AfterClass <?= $_SESSION['user']['username']?></h1></a>
  <nav class="navigation">
    <ul>
      <li class="navElement">
        <a href="post.php">Poser une question</a>
      </li>
      <li class="navElement">
        <a href="index.php?logout">Déconnexion</a>
      </li>
    </ul>
  </nav>

</header>

<?php  endif; ?>
