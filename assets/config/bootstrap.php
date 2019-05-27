<?php

// Fichier de config principal
// (à inclure au début des pages)
// n'a rien à  voir avec Bootstrap CSS...

// __DIR__ est une "constante magique"
// elle retourne le chemin du dossier du fichier dans lequel on l'appelle
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

// require __DIR__ . '/functions.php';

session_start();