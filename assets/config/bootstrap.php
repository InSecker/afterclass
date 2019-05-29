<?php

// Fichier de config principal

// __DIR__ est une "constante magique"
// elle retourne le chemin du dossier du fichier dans lequel on l'appelle
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

require __DIR__ . '/classes/user_object.php';
require __DIR__ . '/classes/post_object.php';
require __DIR__ . '/classes/alert.php';
require __DIR__ . '/classes/vote.php';
require __DIR__ . '/classes/fire.php';

$user = new User($pdo);
$post = new Post($pdo);
$alert = new Alert();
$vote = new Vote();
$fire = new Fire();

session_start();