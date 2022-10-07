<?php
require('./componants/header.php');
require('./componants/co_bdd.php');
require('./componants/function.php');
if (empty($_SESSION)) {
    header('location: connexion.php');
}
if (isset($_GET['action']) && $_GET['action'] == "supp") {
    deleteArticle($bdd, $_GET['id'],$_SESSION['id']);
}
$articles = getMyArticles($bdd, $_SESSION['id']);

?>

<h1>Page profil</h1>

<section>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter un article
    </button>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="profilB.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="titre">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="contenu" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Contenu de bg</label>
                        </div>
                        <div class="input-group mt-3">
                            <input type="file" class="form-control" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">

                        </div>

                        <div class="col-12 mt-5">
                            <button class="btn btn-primary" type="submit">Ajouter</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<section id="mesArticles">

    <h2 class="text-center">Mes articles</h2>

    <div class="listeArticles">
        <?php foreach ($articles as $article) : ?>
            <div class="card" style="width: 18rem;">
                <img src="./uploads/<?= htmlspecialchars($article['image']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($article['contenu']) ?></p>
                    <a href="profil.php?id=<?= htmlspecialchars($article['id']) ?>&action=supp" class="btn btn-danger">Supprimer</a>
                    <a href="modifierArticle.php?id=<?= htmlspecialchars($article['id']) ?>&action=modifier" class="btn btn-warning">Modifier</a>

                </div>
            </div>
        <?php endforeach; ?>

    </div>


</section>



<?php
require('./componants/footer.php');
?>