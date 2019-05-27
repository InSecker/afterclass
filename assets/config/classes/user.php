<?php

class User {

	public $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}


	public function create() {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (strpos($email, '@hetic.net') === false || empty($_POST['email'])) {

			echo 'Entrez une adresse mail HETIC';

		}	else if ($this::mailIsUsed($email)) {

			echo 'L\'adresse email est déjà enregistrée';

		} else if(strlen($email) > 100 ) {

			echo 'L\'adresse email est trop longue';

		} else if($this->usernameIsUsed($username)) {

			echo 'Le nom d\'utilisateur existe déjà';

		} else if(strlen($username) > 20) {

			echo 'Le nom d\'utilisateur est trop long';

		} else if(strlen($password) > 50) {

			echo 'Le mot de passe est trop long';

		} else if (isset($_POST['createAccount'])) {
			$req = $this->pdo->prepare('
				INSERT INTO users (mail, username, type, password) 
				VALUES (
						 :mail ,
						 :username ,
				     "user" ,
						 :password 
				)
			');
			$req->bindParam(':mail', $email);
			$req->bindParam(':username', $username);
			$req->bindParam(':password', $password);
			$req->execute();
		}

	}

	public function mailIsUsed($mail) {
		$req = $this->pdo->query('SELECT mail FROM users');
		$mails = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($mails as $cle) {
			if ($mail == $cle['mail']) {
				return true;
			}
		}
		return false;
	}

	public function usernameIsUsed($username) {
		$req = $this->pdo->query('SELECT username FROM users');
		$usernames = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($usernames as $cle) {
			if ($username == $cle['username']) {
				return true;
			}
		}
		return false;
	}
}