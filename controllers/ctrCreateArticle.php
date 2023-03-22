<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Blog.php';

$title = "Creer un article";

session_start();

if (!isset($_SESSION['user'])){
    header('Location: index.php');
    exit();
}

if ($_SESSION['user']['role'] !== "1"){
        header('Location: account.php');
        exit();
}

$Blog = new Blog();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  var_dump($_FILES);

    $fichierTemporaire = file_get_contents($_FILES['miniature']['tmp_name']);

    $base64 = base64_encode($fichierTemporaire);

    $image = "data:".$_FILES['miniature']['type'].";base64,".$base64;

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $miniature = $image;

  $Blog->creerArticle($_SESSION['user']['prenom']." ".$_SESSION['user']['nom'], htmlspecialchars($meta_title), htmlspecialchars($meta_description), htmlspecialchars($title), htmlspecialchars($content), $miniature);


}
?>