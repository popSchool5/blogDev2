<?php
require('./componants/header.php');
require('./componants/co_bdd.php');
require('./componants/function.php');

$article = getPost($bdd,$_GET['id']); 
?>
<section id="article">
    <img src="./uploads/<?= $article["image"] ?>" width="400px" alt="">
    <h1><?= htmlspecialchars($article["title"]) ?></h1>
    <p><?= htmlspecialchars($article["contenu"]) ?></p>
</section>