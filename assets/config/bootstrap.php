<?php

// Fichier de config principal

// __DIR__ est une "constante magique"
// elle retourne le chemin du dossier du fichier dans lequel on l'appelle
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

require __DIR__ . '/classes/user_object.php';
require __DIR__ . '/classes/post_object.php';
require __DIR__ . '/classes/alert.php';
require __DIR__ . '/classes/comments.php';
require __DIR__ . '/classes/vote.php';
require __DIR__ . '/classes/tags.php';

$user = new User();
$post = new Post();
$alert = new Alert();
$comments = new Comments();
$vote = new Vote();
$tags = new Tag();

session_start();