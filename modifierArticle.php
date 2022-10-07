<?php
require('./componants/header.php');
require('./componants/co_bdd.php');
require('./componants/function.php');
if (empty($_SESSION)) {
    header('location: connexion.php');
}

if (!isset($_GET['id']) && empty($_GET['id']) && !isset($_GET["action"]) && $_GET['action'] !== "modifier") {
    header('location: profil.php');
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET["action"]) && $_GET['action'] == "modifier") {
    $article = getMyArticle($bdd, $_GET['id']);
}

?>

<form action="modifierArticle2.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $article["id"] ?>">
    <input type="hidden" name="imageDefault" value="<?= $article["image"] ?>">
    <input type="text" name="titre" value="<?= $article["title"] ?>">
    <textarea name="contenu" id="" cols="30" rows="10"><?= $article["contenu"] ?></textarea>
    <input type="file" name="image" value="<?= $article["image"] ?>">
    <input type="submit">
</form>