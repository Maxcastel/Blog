<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Blog.php';
require_once './models/Comments.php';

session_start();

$title = "Article";


$Blog = new Blog();

$blog_id = $_GET['id'];

$article = $Blog->getArticle($blog_id);

$Comments = new Comments();


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['se-connecter'])){
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['publier'])){

        $author = $_SESSION['user']['prenom']." ".$_SESSION['user']['nom'];
        $content = $_POST['comment-content'];

        $commentaire = $Comments->createComment(htmlspecialchars($content), $author, $blog_id);
        
    }
}

$commentaires = $Comments->getAllCommentsByBlogId($blog_id);

if (isset($_SESSION['user']))
    $placeholder = $commentaires ? 'Entrez votre commentaire ici' : 'Soyez le premier à ecrire un commentaire';
else
    $placeholder = "Vous devez etre connecté pour pouvoir écrire un commentaire";

?>



