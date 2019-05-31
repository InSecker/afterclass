<?php

class Tag {
	public function getAll(PDO $con) {
		$req = $con->query('SELECT * FROM tags  ORDER BY label ASC');
		return $req->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOne(PDO $con, $id)  {
		if ($id) {
			$req =  $con->query('SELECT * FROM tags WHERE id=' . $id);
			return $req->fetch(PDO::FETCH_ASSOC)['label'];
		} else {
			return 'non définie';
		}
	}
}