<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Users.php';

session_start();

$title = "Mon compte";

if (!isset($_SESSION['user'])){
  header('Location: index.php');
  exit();
}

var_dump($_SESSION);


/*var_dump($_SESSION);
var_dump($_SESSION['user']);
var_dump($_SESSION['user']['role']);

var_dump($_SESSION['user']['prenom']." ".$_SESSION['user']['nom']);

var_dump($_POST);*/

//var_dump($_SESSION['user']['prenom']);
//var_dump($_POST);

//$success = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  //$success = false;

  $Users = new Users();

  $errors = [];
  $regexName = '/^[a-zA-ZÀ-ÿ]{2,30}$/' ;
  /*"/^(?=.{2,30}$)[\p{L}'\-\s]+$/u"*/
  $regexTelephone = '/^0\d{9}$/';
  $regexAge = '/^\d{2,3}$/';

  extract($_POST);

  //var_dump($_POST);
        
  if(isset($_POST['form_infos'])){

      //Traitement erreur concernant le prénom (name="name")
      if (!preg_match($regexName, $name)) {
        //$erreurinfos = true;
        $errors['prenom'] = "Le format du prénom est invalide";
      } 

      //Traitement erreur concernant le nom (name="lastname")
      if (!preg_match($regexName, $lastname)) {
        $errors['nom'] = "Le format du nom est invalide";
      } 

      //Traitement erreur concernant l'age
      if (!preg_match($regexAge, $age)) {
        $errors['age'] = "Le format de l'age est invalide";
      } 

      //Traitement erreur concernant le numéro de telephone
      if (!preg_match($regexTelephone, $telephone)) {
        $errors['telephone'] = "Le format du telephone est invalide";
      }
  
      if(empty($errors)){

        $Users->changeInfos($_SESSION['user']['id'], $name, $lastname, $age, $telephone);
        $success = true;
      } 

    }

    else if(isset($_POST['form_password'])){

      if(empty($password1) || empty($password2)){
        $errors['password'] = "Le mot de passe doit être renseigné";
      }
      else if($password1 !== $password2){
        $errors['password'] = "Les mots de passe doivent être identiques";
      }

      // SI NOUS N'AVONS AUCUNE ERREUR, ALORS ON PEUT INSERER EN BASE DE DONNEES !
      if(empty($errors)){

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        
        $Users->changePassword($_SESSION['user']['id'], $passwordHash);
        $success = true;
      } 
  
    }


  if(isset($_POST['form_deconnexion'])){
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
  }

  /*else if(isset($_POST['form_infos'])){

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $telephone = $_POST['telephone'];

    $Users->changeInfos($_SESSION['user']['id'], $name, $lastname, $age, $telephone);
  }*/

  /*else if(isset($_POST['form_password'])){

    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2){
      $passwordHash = password_hash($password, PASSWORD_BCRYPT);

      $Users->changePassword($_SESSION['user']['id'], $passwordHash);
    }

  }*/
}

//var_dump($_SESSION['user']);

?>