<?php

class Post
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPost()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        if (empty($titre) and empty($content) and empty($author)) {

            echo 'Veuillez remplir tout les champs';
        } else {
            $req = $this->pdo->prepare('
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

            echo 'message envoyé';
        }

    }

    function allPosts(PDO $con)
    {
        $req = $con->query('SELECT * FROM posts');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function deletePost(PDO $con)
    {

       if(isset($_GET['id'])) {
           $req = $con->query('DELETE FROM posts where id='.$_GET['id']);

       }

    }
}
