<?php

require 'assets/config/bootstrap.php';
$page_title = 'AfterClass';

include  'assets/inc/header.php';

?>


<div class="">
	<h1>Création Compte</h1>

	<form action="accountCreation.php" method="post">

		<label for="indent">Email</label>
		<input id="indent" type="text" name="identifiant">

		<label for="indent">Username</label>
		<input id="indent" type="text" name="username">

		<label for="mdp">Mot de passe</label>
		<input type="password" id="mdp" name="mdp" class="form-control">

		<input type="submit" name="login" value="Connexion">
	</form>
</div>