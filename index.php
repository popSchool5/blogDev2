<?php
require('./componants/header.php');
require('./componants/co_bdd.php');
require('./componants/function.php');
$users = getUsers();
$articles = getPosts($bdd);
// var_dump($articles); 
?>
<h1>Fil d'actu</h1>
<section id="lesActus">
    <?php foreach ($articles as $article) : ?>
        <div class="card" style="width: 18rem;">
            <img src="./uploads/<?= $article['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($article['title']) ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($article['contenu']) ?></p>
                <p><?php echo htmlspecialchars($article['name']) ?></p>
                <a href="article.php?id=<?= $article["id"] ?>" class="btn btn-primary">Voir l'article</a>
            </div>
        </div>
    <?php endforeach; ?>

</section>

<?php
require('./componants/footer.php');
?>