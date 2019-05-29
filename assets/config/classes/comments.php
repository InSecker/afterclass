<?php 

class Comments {

    public function addComment(PDO $con){

        $author = $_SESSION['user']['username'];
        $content = $_POST['comment_content'];
        $postID = $_GET['id'];

        if(empty($author) OR empty($content)) {
            echo 'Nom d\'utilisateur vide';
        } else {

            $req = $con->prepare('
                INSERT INTO comments( author , content, post_id ) 
                VALUES (
                    :author, 
                    :content,
                    :postID
                )
            ');
            $req->bindParam(':author', $author);
            $req->bindParam(':content', $content);
            $req->bindParam(':postID', $postID);
            $req->execute();

        }
    }

    public function viewComments(PDO $con) {

        $req = $con->prepare('SELECT author, content, DATE_FORMAT(
                                                    date, \'%d/%m/%Y à %Hh%imin%ss\') 
                                                    AS date
                                                    FROM comments
                                                    WHERE post_id = :id
                                                    ORDER BY date DESC ' );

        $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $req->execute();
                                                    
        return $req->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteComment(PDO $con)
    {

       if(isset($_GET['id'])) {
           $req = $con->query('DELETE FROM comments where id='.$_GET['id']);
       }

    }


}