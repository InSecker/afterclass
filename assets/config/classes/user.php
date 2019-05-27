<?php

class User {

	public function create($pdo) {

		if(isset($_POST['email'])) {
			$this->email = $_POST['email'];
		}

		if (isset($_POST['createAccount'])) {
			$req = $pdo->prepare('
				INSERT INTO users (mail, username, type, password) 
				VALUES (
						 :mail ,
						 :username ,
				     "user" ,
						 :password 
				)
			');
			$req->bindParam(':mail', $_POST['email']);
			$req->bindParam(':username', $_POST['username']);
			$req->bindParam(':password', $_POST['password']);
			$req->execute();
		}

	}

}