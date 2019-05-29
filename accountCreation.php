<?php

require 'assets/config/bootstrap.php';
$page_title = 'AfterClass';

if (isset($_POST['email'])) {
	$user->create($pdo);
}

include  'assets/inc/header.php';



?>


<div class="connexion__container">
<?php $user->message->showAlert(); ?>
	<img class= "connexion__logo" src="assets/images/logo.png" alt="logo">

	<form class="connexion__form"action="accountCreation.php" method="post">

		<label class="form__label" for="email">Email</label>
		<input class="form__field" id="email" type="text" name="email">

		<label class="form__label" for="username">Username</label>
		<input class="form__field" id="username" type="text" name="username">

		<label class="form__label" for="mdp">Mot de passe</label>
		<input class="form__field" type="password" id="mdp" name="password" class="">

		<input class="form__submit" type="submit" name="createAccount" value="Soumettre">
	</form>
	
	<a class="connexion_create" href="index.php">Déja un compte ? connectez-vous !</a>

</div>

	

<style>

body {
	height: 100vh;
	width: 100vw;
	background: url('assets/images/background.png') no-repeat center fixed;
  background-size: cover;

}
</style>