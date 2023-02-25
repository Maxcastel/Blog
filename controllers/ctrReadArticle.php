<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Blog.php';
require_once './models/Comments.php';

session_start();

$title = "Article";

$Blog = new Blog();

//var_dump($_GET);

$blog_id = $_GET['id'];

$article = $Blog->getArticle($blog_id);

/*var_dump($_GET['id']);

var_dump($article);*/

/*var_dump($_SESSION);

var_dump($_SESSION['user']);*/

$Comments = new Comments();


/*if (!isset($_SESSION['user'])){
    $connecte = false;
}
else{
    $connecte = true;
}*/

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['se-connecter'])){
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['publier'])){

        //$Comments = new Comments();

        $author = $_SESSION['user']['prenom']." ".$_SESSION['user']['nom'];
        $content = $_POST['comment-content'];
        //$blog_id = $_GET['id'];

        $commentaire = $Comments->createComment(htmlspecialchars($content), $author, $blog_id);

        //var_dump($commentaire);
        
    }
}

$commentaires = $Comments->getAllCommentsByBlogId($blog_id);

if (isset($_SESSION['user']))
    $placeholder = $commentaires ? 'Entrez votre commentaire ici' : 'Soyez le premier à ecrire un commentaire';
else
    $placeholder = "Vous devez etre connecté pour pouvoir écrire un commentaire";

//var_dump($commentaires);

/*$Nombrecommentaires = $Comments->NombreComments();

if ($Nombrecommentaires == 0){
    $commentExist = false;
}
else{
    $commentExist = true;
}*/

?>



