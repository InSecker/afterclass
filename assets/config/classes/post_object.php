<?php

class Post
{

    public $post;
    public function __construct()
    {
        $this->message = new Alert();
    }

    public function addPost(PDO $con)
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_SESSION['user']['username'];
        $tagID = $_POST['tags'];
        if (empty($titre) and empty($content)) {

            $this->message->createAlert("Veuillez remplir tout les champs", 'red');
				die();
        } else {
            $req = $con->prepare('
				INSERT INTO posts (title, content, author, tag) 
				VALUES (
						 :title,
						 :content,
						 :author,
				     :tag
				)
			');
            $req->bindParam(':title', $title);
            $req->bindParam(':content', $content);
            $req->bindParam(':author', $author);
			$req->bindParam(':tag', $tagID);
            $req->execute();
            $this->message->createAlert("Message envoyé", 'green');
        }
    }

    function getAll(PDO $con)
    {
    	if (isset($_GET['tags'])) {
    		$tag= $_GET['tags'];
				$req = $con->query('SELECT * FROM posts WHERE tag="'. $tag. '" ORDER BY date DESC');
			} else {
				$req = $con->query('SELECT * FROM posts ORDER BY date DESC');
			}
    	return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne(PDO $con, $id)  {
    	$req =  $con->query('SELECT * FROM posts WHERE id=' . $id);
    	return $req->fetch(PDO::FETCH_ASSOC);
		}

		function update(PDO $con, $id) {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$author = $_SESSION['user']['username'];
			if (empty($titre) and empty($content) and empty($author)) {

				$this->message->createAlert("Veuillez remplir tout les champs", 'red');

			} else {

				$req = $con->prepare('
					UPDATE posts
					SET title = :title,
							content = :content
					WHERE id =' . $id);
				$req->bindParam(':title', $title);
				$req->bindParam(':content', $content);
				$req->execute();

				$this->message->createAlert("Message modifié", 'green');
			}
    }


    function deletePost(PDO $con, $id)
    {
    	$req = $con->query('DELETE FROM posts where id='.$id);
			$req->execute();
			header('Location: home.php');
    }
}
