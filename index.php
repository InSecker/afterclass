<?php

require 'assets/config/bootstrap.php';
$page_title = 'AfterClass - Connexion';

if ( isset($_POST['login']) ) {
	$user->connect();
}

include  'assets/inc/header.php';

?>


<div class="">
	<h1>Connexion</h1>

	<form action="index.php" method="post">

		<label for="indent">Email / Pseudo</label>
		<input id="indent" type="text" class="form-control" name="identifiant">

		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password" class="form-control">

		<input type="submit" name="login" class="" value="Connexion">
	</form>

  <a href="accountCreation.php">Créer un compte</a>
</div>