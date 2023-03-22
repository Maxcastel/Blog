<?php
require_once './controllers/ctrCreateAccount.php';
include './layouts/header.php';
?>


  <section class="form-creer-compte">
    <form class="form" action="createAccount.php" method="POST">
    <?= isset($success) ? '<p class="success">Compte créé !</p>' : '' ?>

    <p class="connexion">Créer un compte</p>
    <div class="infos-users">
     <label for="name">Prenom :</label>
     <?= isset($errors['prenom']) ? '<p class="erreur">'. $errors['prenom'] .'</p>' : '' ?>
     <input type="text" id="prenom" name="prenom" placeholder="Votre prenom">
    </div>
    <div class="infos-users">
      <label for="lastname">Nom :</label>
      <?= isset($errors['nom']) ? '<p class="erreur">'. $errors['nom'] .'</p>' : '' ?>
      <input type="text" id="nom" name="nom" placeholder="Votre nom">
    </div>
      <div class="infos-users">
        <label for="email">Adresse e-mail</label>
        <?= isset($errors['email']) ? '<p class="erreur">'. $errors['email'] .'</p>' : '' ?>
        <input type="email" id="email" name="email" placeholder="email@gmail.com">
      </div>
      <div class="infos-users">
        <label for="password">Mot de passe :</label>
        <?= isset($errors['password']) ? '<p class="erreur">'. $errors['password'] .'</p>' : '' ?>
        <input type="password" id="password" name="password1" placeholder="************">
      </div>
       <div class="infos-users"> 
        <label for="password2">Confirmer le mot de passe :</label>
        <input type="password" id="password2" name="password2" placeholder="************">
      </div>

      <div>
        <input class="creer-compte" type="submit" value="Creer un compte" name="submit-creer-compte">
      </div>
      <a href="login.php" class="se-connecter">Se connecter</a>
    </form>
  </section>

<?php
include './layouts/footer.php';
?>



