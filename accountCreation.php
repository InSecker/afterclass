<?php

require 'assets/config/bootstrap.php';
$page_title = 'AfterClass';

$account = new User($pdo);

if (isset($_POST['email'])) {
	$account->create($pdo);
}

include  'assets/inc/header.php';

?>


<div class="">
	<h1>Création Compte</h1>

	<form action="accountCreation.php" method="post">

		<label for="email">Email</label>
		<input id="email" type="text" name="email">

		<label for="username">Username</label>
		<input id="username" type="text" name="username">

		<label for="mdp">Mot de passe</label>
		<input type="password" id="mdp" name="password" class="form-control">

		<input type="submit" name="createAccount" value="Soumettre">
	</form>
</div>