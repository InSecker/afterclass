<?php

class Post
{

    public function __construct()
    {
        $this->message = new Alert();
    }

    public function addPost(PDO $con)
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_SESSION['user']['username'];
        if (empty($titre) and empty($content) and empty($author)) {

            $this->message->createAlert("Veuillez remplir tout les champs", 'red');

        } else {
            $req = $con->prepare('
				INSERT INTO posts (title, content, author) 
				VALUES (
						 :title ,
						 :content ,
						 :author
				)
			');
            $req->bindParam(':title', $title);
            $req->bindParam(':content', $content);
            $req->bindParam(':author', $author);
            $req->execute();

            $this->message->createAlert("Message envoyé", 'green');


        }

    }

    function getAll(PDO $con)
    {
        $req = $con->query('SELECT * FROM posts ORDER BY date DESC');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOne(PDO $con, $id)  {
    	$req =  $con->query('SELECT * FROM posts WHERE id=' . $id);
    	return $req->fetch(PDO::FETCH_ASSOC);
		}

    function deletePost(PDO $con)
    {

       if(isset($_GET['id'])) {
           $req = $con->query('DELETE FROM posts where id='.$_GET['id']);

       }

    }
}
