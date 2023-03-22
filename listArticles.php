<?php
require './controllers/ctrListArticles.php';
include './layouts/header.php'
?>

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

