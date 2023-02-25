<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Users.php';

session_start();

if (isset($_SESSION['user'])){
  header('Location: account.php');
  exit();
}

$title = "Connexion";

$Users = new Users();

$error = false;

$idUser = false;


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $idUser = $Users->getID($_POST['email']);

    if($idUser === false){
      $error = true; 
    } 
    else {
      $user = $Users->getUser($idUser);
      if(password_verify($_POST['password'], $user['password'])){
            unset($user['password']);
            $_SESSION['user'] = $user;

            header('Location: account.php');
            exit();

        } else {
          $error = true;
        }
    }
}

?>

