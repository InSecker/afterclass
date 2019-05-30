<?php

class User {
	public $message;

	public function __construct()
	{
	    $this->message = new Alert();
	}

	public function create(PDO $con) {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (strpos($email, '@hetic.net') === false || empty($_POST['email'])) {

			echo 'Entrez une adresse mail HETIC';
			$this->message->createAlert('Il vous faut une adresse mail HETIC pour vous connecter', 'red');


		}	else if ($this::mailIsUsed($con, $email)) {

            $this->message->createAlert("L'adresse e-mail est déjà enregistrée", 'red');

		} else if(strlen($email) > 100 ) {

            $this->message->createAlert("L'adresse email est trop longue", 'red');

		} else if($this->usernameIsUsed($con, $username)) {

            $this->message->createAlert("Le nom d'utilisateur existe déjà", 'red');

		} else if(strlen($username) > 20) {

            $this->message->createAlert("Le nom d'utilisateur est trop long", 'red');


        } else if(strlen($password) > 50) {

            $this->message->createAlert("Le mot de passe est trop long", 'red');


        } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {

            $this->message->createAlert("Votre mot de passe doit contenir au moins une majuscule, une miniscule, une chiffre et au moins 8 caractères", 'red');


        } else if (isset($_POST['createAccount'])) {
			$req = $con->prepare('
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
			$password = password_hash($password, PASSWORD_DEFAULT);
			echo $password;
			$req->bindParam(':password', $password);
			$req->execute();
			header('Location: index.php');
			exit();
		}

	}

	public function mailIsUsed(PDO $con, $mail) {
		$req = $con->query('SELECT mail FROM users');
		$mails = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($mails as $cle) {
			if ($mail == $cle['mail']) {
				return true;
			}
		}
		return false;
	}

	public function usernameIsUsed(PDO $con, $username) {
		$req = $con->query('SELECT username FROM users');
		$usernames = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($usernames as $cle) {
			if ($username == $cle['username']) {
				return true;
			}
		}
		return false;
	}

	public function connect(PDO $con) {
		// Rechercher l'user
		$req = $con->prepare('
			SELECT *
			FROM users
			WHERE
				mail = :identifiant
				OR username = :identifiant
		');
		$req->bindParam(':identifiant', $_POST['identifiant']);
		$req->execute();

		$user = $req->fetch(PDO::FETCH_ASSOC);
		if (!$user) {

            $this->message->createAlert("Aucun utilisateur n'a été trouvé", 'red');


        } else if(!password_verify($_POST['password'], $user['password'])) {
			// si le mdp ne correspond pas au hash en BDD
            $this->message->createAlert("Le mot de passe ne correspond pas", 'red');

        } else {
			// On enregistre l'utilisateur en session
			unset($user['mdp']); // le hash du mdp n'est pas à stocker en session
			$_SESSION['user'] = $user;

			// Redirection vers la page d'accueil
			session_write_close();
			header('Location: home.php');
		}
	}

	public function disconnect() {
		// Déconnexion
		if (isset($_GET['logout'])) {
			unset($_SESSION['user']);
			header('Location: index.php');
		}
	}
}