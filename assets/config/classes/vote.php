<?php

class Vote {

	public function up(PDO $con, $ref_id, $ref) {

		$req =  $con->query('SELECT vote FROM votes WHERE (user="' . $_SESSION['user']['username'] . '" AND ref="post" AND ref_id="' . $ref_id .'")');
		$voteStatus = $req->fetch(PDO::FETCH_ASSOC)['vote'];

		if ($voteStatus === 'down'){
			$req = $con->prepare('
				UPDATE votes
				SET vote="up"
				WHERE (user="' . $_SESSION['user']['username'] . '" AND ref="post" AND ref_id="' . $ref_id .'")
			');
			$req->execute();
		} else if (!$voteStatus) {
			$id = $ref_id;

			$req = $con->prepare('
				INSERT INTO votes (ref_id, ref, user, vote) 
				VALUES (
						 :ref_id,
						 :ref,
						 :user,
						 "up"
				)
			');
			$req->bindParam(':ref_id', $id);
			$req->bindParam(':ref', strval($ref));
			$req->bindParam(':user', $_SESSION['user']['username']);
			$req->execute();
		}
	}

	public function down(PDO $con, $ref_id, $ref) {


		$req =  $con->query('SELECT vote FROM votes WHERE (user="' . $_SESSION['user']['username'] . '" AND ref="' . $ref . '" AND ref_id="' . $ref_id .'")');
		$voteStatus = $req->fetch(PDO::FETCH_ASSOC)['vote'];

		if ($voteStatus === 'up'){
			$req = $con->prepare('
				UPDATE votes
				SET vote="down"
				WHERE (user="' . $_SESSION['user']['username'] . '" AND ref="post" AND ref_id="' . $ref_id .'")
			');
			$req->execute();
		} else if (!$voteStatus) {
			$id = $ref_id;

			$req = $con->prepare('
				INSERT INTO votes (ref_id, ref, user, vote) 
				VALUES (
						 :ref_id,
						 :ref,
						 :user,
						 "down"
				)
			');
			$req->bindParam(':ref_id', $id);
			$req->bindParam(':ref', strval($ref));
			$req->bindParam(':user', $_SESSION['user']['username']);
			$req->execute();
		}
	}

	public function count(PDO $con, $ref_id, $ref) {
		$req = $con->query('SELECT COUNT(*) FROM votes WHERE (ref="' . $ref . '" AND ref_id="' . $ref_id .'" AND vote="up")');
		$up = $req->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];
		$req = $con->query('SELECT COUNT(*) FROM votes WHERE (user="' . $_SESSION['user']['username'] . '" AND ref="' . $ref . '" AND ref_id="' . $ref_id .'" AND vote="down")');
		$down = $req->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];
		//$req = $con->query('SELECT COUNT(*) FROM votes WHERE (vote="down")');

		return $up-$down;
	}
}
