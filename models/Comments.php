<?php

class Comments extends Database{

    public function createComment($content,	$author, $blog_id){

        $db = $this->connectDB();
        
        $requete = "INSERT INTO comments 
        (comments_content, comments_author,	comments_published_at, comments_validate, blog_id) 
        VALUES (:content, :author, now(), 0, :blog_id)";

        $statment = $db->prepare($requete);

        $statment->bindValue(":content", $content, PDO::PARAM_STR);
        $statment->bindValue(":author", $author, PDO::PARAM_STR);

        $statment->bindValue(":blog_id", $blog_id, PDO::PARAM_INT);

        $statment->execute();
    }
    
    public function getAllComments(){

        $db = $this->connectDB();

        $requete = "SELECT * FROM comments";

        $statment = $db->prepare($requete);

        $statment->execute();

        $comments = $statment->fetchAll();

        return $comments;
    }

    public function getAllCommentsByBlogId($blog_id){

        $db = $this->connectDB();

        $requete = "SELECT * FROM comments WHERE blog_id = :blog_id";

        $statment = $db->prepare($requete);

        $statment->bindValue(":blog_id", $blog_id, PDO::PARAM_INT);

        $statment->execute();

        $comments = $statment->fetchAll();

        return $comments;
    }

}

?>