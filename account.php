<?php
require './controllers/ctrAccount.php';
include './layouts/header.php'
?>


    <main id="account">
        <h1>Bienvenue <?= $_SESSION['user']['prenom'] ?> <?= $_SESSION['user']['nom'] ?>, sur ton espace personnel !</h1>

        <section class="form-change-infos">
          <form class="form" action="account.php" method="POST">
          <?= isset($success) ? '<p class="success">Informations changées !</p>' : '' ?>
          <p class="modifier-informations">Modifier ses informations</p>
            <div class="infos-users">
              <label for="name">Prenom :</label>
              <?= isset($errors['prenom']) ? '<p class="erreur">'. $errors['prenom'] .'</p>' : '' ?>
              <input type="text" id="name" name="name" value="<?= $_SESSION['user']['prenom'] ?>">
            </div>
            <div class="infos-users">
              <label for="lastname">Nom :</label>
              <?= isset($errors['nom']) ? '<p class="erreur">'. $errors['nom'] .'</p>' : '' ?>
              <input type="text" id="lastname" name="lastname" value="<?= $_SESSION['user']['nom'] ?>">
            </div>
            <div class="infos-users">
              <label for="age">Age :</label>
              <?= isset($errors['age']) ? '<p class="erreur">'. $errors['age'] .'</p>' : '' ?>
              <input type="number" id="age" name="age" value="<?= $_SESSION['user']['age'] ?>">
            </div>
            <div class="infos-users">
              <label for="telephone">Téléphone :</label>
              <?= isset($errors['telephone']) ? '<p class="erreur">'. $errors['telephone'] .'</p>' : '' ?>
              <input type="tel" id="telephone" name="telephone" value="<?= $_SESSION['user']['telephone'] ?>">
            </div>
              <input class="soumettre" type="submit" id="soumettre" value="Soumettre" name="form_infos">
          </form>
        </section>

        <section class="form-change-password">
          <form action="account.php" method="POST">
          <?= isset($success) ? '<p class="success">Mot de passe changé !</p>' : '' ?>
          <p class="modifier-password">Modifier son mot de passe</p>
            <div class="info-password">
              <label for="password">Mot de passe :</label>
              <?= isset($errors['password']) ? '<p class="erreur">'. $errors['password'] .'</p>' : '' ?>
              <input type="password" id="password" name="password1" placeholder="************">
            </div>
            <div class="info-password"> 
              <label for="password2">Confirmer le mot de passe :</label>
              <input type="password" id="password2" name="password2" placeholder="************">
            </div>
              <input class="soumettre" type="submit" id="soumettre2"value="Soumettre" name="form_password">
          </form>
        </section>

        <section class="form-se-deconnecter">
          <form action="account.php" method="POST">
            <input type="submit" id="logout" value="Se déconnecter" name="form_deconnexion">
          </form>
        </section>
        <a class="bouton-creer-article" href="createArticle.php">Créer un article</a>

    </main>
    
<?php
include './layouts/footer.php';
?>
