<?php
require './controllers/ctrListArticles.php';
include './layouts/header.php'
?>


    
    <!--<?php foreach($articles as $article) : ?>
    <div class="card" style="width: 18rem;">
      <img src="<?= $article['blog_thumbnail_image'] ?>" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title"><?= $article['blog_meta_title'] ?></h5>
        <p class="card-text"><?= $article['blog_meta_description'] ?></p>
        <a href="readArticle.php?id=<?= $article['blog_id'] ?>" class="btn btn-primary">Voir l'article</a>
      </div>
    </div>
<?php endforeach; ?>-->


  <section class="cards">
    <?php foreach($articles as $article) : ?>
      <article class="card">
        <div class="card-miniature">
          <img src="<?= $article['blog_thumbnail_image'] ?>" class="miniature" alt="">
        </div>
        <div class="card-body">
          <h2 class="card-title"><?= $article['blog_title'] ?></h2>
          <p class="card-meta-description"><?= $article['blog_meta_description'] ?></p>
          <a href="readArticle.php?id=<?= $article['blog_id'] ?>" class="bouton-voir-article">Voir l'article</a>
        </div>
      </article>
    <?php endforeach; ?>
  </section>

<?php
include './layouts/footer.php';
?>

