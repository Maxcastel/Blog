<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/listArticles.css">
    <title><?= $title ?? 'titre par défaut' ?></title>
</head>
<body>
  <header>
    <nav>
      <ul>        
          <li><a href="index.php">Accueil</a></li>
          <?php
          if(isset($_SESSION['user'])){

                if($_SESSION['user']['role'] == "1"){
                  echo '<li><a href="panelAdmin.php">Admin</a></li>';
                }

                echo '<li><a href="account.php">Mon compte</a></li>';
                echo '<li><a href="logout.php">Se deconnecter</a></li>';
          }
          else{
            echo '<li><a href="login.php">Se connecter</a></li>';
            echo '<li><a href="createAccount.php">Creer un compte</a></li>';
          }
          ?>
      </ul>
    </nav>
  </header>