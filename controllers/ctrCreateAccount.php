<?php
require_once './config.php';
require_once './models/Database.php';
require_once './models/Users.php';

$title = "Creer un compte";

//$erreurinfos = false;

//$success = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  //$success = false;

  $Users = new Users();

  $errors = [];
  $regexName = '/^[a-zA-ZÀ-ÿ]{2,30}$/';
  /*"/^(?=.{2,30}$)[\p{L}'\-\s]+$/u"*/

  extract($_POST);
 
  /*var_dump($_POST); 
 
  var_dump($prenom);*/


  //Traitement erreur concernant le prénom
  if (!preg_match($regexName, $prenom)) {
    //$erreurinfos = true;
    $errors['prenom'] = "Le format du prénom est invalide";
  } 

  //Traitement erreur concernant le nom
  if (!preg_match($regexName, $nom)) {
    $errors['nom'] = "Le format du nom est invalide";
  } 

  // Traitement erreurs concernant l'email
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Le format du mail est invalide";
  }
  else if ($Users->getID($email)){
    $errors['email'] = "L'email existe déjà";
  }
  
  // Traitement erreurs concernant le password
  if(empty($password1) || empty($password2)){
    $errors['password'] = "Le mot de passe doit être renseigné";
  }
  else if($password1 !== $password2){
    $errors['password'] = "Les mots de passe doivent être identiques";
  }
        
  // SI NOUS N'AVONS AUCUNE ERREUR, ALORS ON PEUT INSERER EN BASE DE DONNEES !
  if(empty($errors)){

    $Users->createAccount($prenom, $nom, $email, password_hash($password1, PASSWORD_BCRYPT));
    $success = true;
  } 

  /*if (!empty($password1) && !empty($password2)){
    if ($password1 == $password2){
      $passwordHash = password_hash($password1, PASSWORD_BCRYPT);
  
      $password = $passwordHash;
  
      $Users->createAccount($prenom, $nom, $email, $password);
      $success = true;
    } 
    else{
      //$erreurinfos = true;
      $errors[3] = 'Veuillez entrer le meme mot de passe';
    }
  } else{
    //$erreurinfos = true;
    $errors[3] = 'Veuillez entrer le meme mot de passe';
  }
  
  //var_dump($erreurinfos);
  */
}
?>


