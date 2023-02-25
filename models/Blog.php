<?php

class Blog extends Database{

    public function creerArticle($auteur, $meta_title, $meta_description, $title, $content, $miniature){

        $db = $this->connectDB();

        $requete = "INSERT INTO blog 
        (blog_title, blog_thumbnail_image, blog_content, blog_author, blog_published_at, blog_active, blog_meta_title, blog_meta_description) 
        VALUES (:blog_title, :blog_thumbnail_image, :blog_content, :author, now(), 0, :meta_title, :meta_description)";

        $statment = $db->prepare($requete);

        $statment->bindValue(":meta_title", $meta_title, PDO::PARAM_STR);
        $statment->bindValue(":meta_description", $meta_description, PDO::PARAM_STR);

        $statment->bindValue(":blog_title", $title, PDO::PARAM_STR);
        $statment->bindValue(":blog_content", $content, PDO::PARAM_STR);
        $statment->bindValue(":blog_thumbnail_image", $miniature, PDO::PARAM_STR);

        $statment->bindValue(":author", $auteur, PDO::PARAM_STR);

        $statment->execute();
    }

    public function getAllArticles(){

        $db = $this->connectDB();

        $requete = "SELECT * FROM blog";

        $statment = $db->prepare($requete);

        $statment->execute();

        $articles = $statment->fetchAll();

        return $articles;
    }

    public function getArticle($id){

        $db = $this->connectDB();

        $requete = "SELECT * FROM blog WHERE blog_id = :id";

        $statment = $db->prepare($requete);

        $statment->bindValue(":id", $id, PDO::PARAM_INT);

        $statment->execute();

        $result = $statment->fetch();
        
        return $result; 
    }

}



?>
