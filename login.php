<?php
require './controllers/ctrLogin.php';
include './layouts/header.php'
?>


  <section class="form-login">
    <form class="form" action="login.php" method="POST">
    <p class="connexion">Connexion</p>
      <div class="infos-users">
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" placeholder="email@gmail.com">
      </div>
      <div class="infos-users">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="************">
      </div>
      <div>
        <input class="login" type="submit" value="Login">
      </div>
      <div class="create-account">
        <p class="pas-de-compte">Pas de compte ?</p>
        <a class="creer-un-compte" href="createAccount.php">Créer un compte</a>
      </div>
      <?php if($error) : ?>
            <p class="erreur">
              Utilisateur ou mot de passe incorrect
            </p>
        <?php endif; ?>
    </form>
  </section>


<?php
include './layouts/footer.php';
?>