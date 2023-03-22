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

/*$cheminImage = $_FILES['miniature']['tmp_name'];

$fichierTemporaire = file_get_contents($cheminImage);*/

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  var_dump($_FILES);

  //if(isset($_FILES['miniature'])){

    $fichierTemporaire = file_get_contents($_FILES['miniature']['tmp_name']);

    $base64 = base64_encode($fichierTemporaire);

    $image = "data:".$_FILES['miniature']['type'].";base64,".$base64;

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $miniature = $image;

  //}

  $Blog->creerArticle($_SESSION['user']['prenom']." ".$_SESSION['user']['nom'], htmlspecialchars($meta_title), htmlspecialchars($meta_description), htmlspecialchars($title), htmlspecialchars($content), $miniature);

  /*var_dump($_POST);

  var_dump($_FILES);

  var_dump($_FILES['miniature']);

  var_dump($_FILES['miniature']['tmp_name']);

  var_dump($base64);

  var_dump($_FILES['miniature']['tmp_name']);*/

}
?>