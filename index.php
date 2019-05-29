<?php

require 'assets/config/bootstrap.php';
$page_title = 'AfterClass - Connexion';

$user->disconnect();
if (isset($_SESSION['user'])) {
  header('Location: home.php');
}

if ( isset($_POST['login']) ) {
	$user->connect($pdo);
}


include  'assets/inc/header.php';

?>



<div class="connexion__container">
  <img class="indexLogo" src="assets/images/logo.svg" alt="">

	<form class="connexion__form" action="index.php" method="post">

		<label class="form__label" for="indent">Email / Pseudo</label>
		<input class="form__field" id="indent" type="text" class="form-control" name="identifiant">

		<label class="form__label" for="password">Mot de passe</label>
		<input class="form__field" type="password" id="password" name="password" class="form-control">

		<input class="form__submit"  type="submit" name="login" class="" value="Connexion">
	</form>

	<a class="connexion_create"href="accountCreation.php">Créer un compte</a>
</div>


