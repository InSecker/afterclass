<?php


class User {
    public $message;
	public $pdo;

	public function __construct($pdo)
	{
	    $this->message = new Alert();
		$this->pdo = $pdo;
	}

	public function create() {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (strpos($email, '@hetic.net') === false || empty($_POST['email'])) {

			echo 'Entrez une adresse mail HETIC';
			$this->message->createAlert('test', 'red');


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

		} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {

			echo 'Votre mot de passe doit contenir au moins une majuscule, une miniscule, une chiffre et au moins 8 caractères';

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
			$password = password_hash($password, PASSWORD_DEFAULT);
			echo $password;
			$req->bindParam(':password', $password);
			$req->execute();
			header('Location: index.php');
			exit();
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

	public function connect() {
		// Rechercher l'user
		$req = $this->pdo->prepare('
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

			echo 'Aucun utilisateur n\'a été trouvé';

		} else if(!password_verify($_POST['password'], $user['password'])) {
			// si le mdp ne correspond pas au hash en BDD
			echo 'Le mot de passe ne correspond pas';
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