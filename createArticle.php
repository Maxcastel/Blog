<?php
require './controllers/ctrCreateArticle.php';
include './layouts/header.php'
?>



    <section id="form-creer-article">
      <p>Creer un article</p>
      <form action="createArticle.php" method="POST" enctype="multipart/form-data">
        <div class="infos-article">
          <label for="meta_title">Meta Title :</label>
          <input type="text" id="meta_title" name="meta_title">
        </div>
        <div class="infos-article">
          <label for="meta_description">Meta Description :</label>
          <input type="text" id="meta_description" name="meta_description">
        </div>
        
        <div class="infos-article">
          <label for="title">Title :</label>
          <input type="text" id="title" name="title">
        </div>

        <div class="infos-article">
          <textarea name="content" id="content" rows="5" cols="40"></textarea>
        </div>

        <div class="infos-article">
          <label for="miniature">Miniature :</label>
          <input type="file" id="miniature" name="miniature">
        </div>

          <input class="creer" type="submit" id="creer"value="creer" name="creer">
      </form>
    </section>

    <div>
      <a href="listArticles.php">
        <button>Voir les articles</button>
      </a>
    </div>
    <div>
      <a href="account.php">
        <button>Mon compte</button>
      </a>
    </div>

    <!--<a class="btn btn-primary" href="target">Intitulé du bouton</a>-->

    <!--<div class="card" style="width: 18rem;">
      <img src="<?= $image ?>" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>-->

    
<?php
include './layouts/footer.php';
?>
