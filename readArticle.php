<?php
require './controllers/ctrReadArticle.php';
include './layouts/header.php'
?>


    <main id="lire-article"> 

      <section id="article">
        <h1><?= $article['blog_title'] ?></h1>
        <p><?= $article['blog_content'] ?></p>
      </section>

      <section id="commentaires">
        <p class="commentaire-titre">Commentaires</p>

        <div class="textareas">

        <?php if (!$commentaires) : ?>
          <p class="no-comments">Pas de commentaires pour le moment</p>
        <?php endif; ?>

        <form action="readArticle.php?id=<?= $_GET['id'] ?>" method="POST">
          <div>
            <textarea class="logged" name="comment-content" cols="30" rows="10" placeholder="<?= $placeholder ?>" <?= isset($_SESSION['user']) ? '' : 'disabled' ?>></textarea>
          </div>
          <input type="<?= isset($_SESSION['user']) ? 'submit' : 'hidden' ?>" id="publier" value="Publier" name="publier">
        </form>
        <!--<?= isset($_SESSION['user']) ? ' ' : '<a href="Login.php" class="login-bouton"></a>' ?>-->

        <?php if ($commentaires) : ?>

          <?php foreach ($commentaires as $commentaire) : ?>

            <ul class="list-commentaires">
              <li class="commentaire">
                <div class="comment">
                  <p class="comment-auteur"><?= $commentaire['comments_author'] ?></p>
                  <p class="comment-content">
                    <?= $commentaire['comments_content'] ?>
                  </p>
                  <p class="comment-date"><?= $commentaire['comments_published_at'] ?></p>
                </div>
                <hr>
              </li>
            </ul>

          <?php endforeach; ?>

        <?php endif; ?>

        

      </section> 
    </main>


<?php
include './layouts/footer.php';
?>

