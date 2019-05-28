<?php

// Fichier de config principal

// __DIR__ est une "constante magique"
// elle retourne le chemin du dossier du fichier dans lequel on l'appelle
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

require __DIR__ . '/classes/user_object.php';

$user = new User($pdo);

// require __DIR__ . '/functions.php';

session_start();