<?php
session_start();
if (isset($_POST['titre']) && isset($_POST["contenu"])) {
   
    if (array_key_exists('image', $_FILES)) {
        if ($_FILES['image']['error'] == 0) {
            if (in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/png', 'image/jpeg'])) {
                if ($_FILES['image']['size'] <= 3000000) {
                    require('./componants/co_bdd.php');
                    $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageFileName);
                    $req = "UPDATE articles SET title = ?,contenu = ?, image = ?, id_users = ? WHERE id = ?";
                    $req = $bdd->prepare($req);
                    $req->execute([
                        $_POST["titre"],
                        $_POST['contenu'],
                        $imageFileName,
                        $_SESSION["id"],
                        $_POST['id']

                    ]);
                    header('location: index.php');
                } else {
                    echo 'Le fichier est trop volumineux…';
                }
            } else {
                echo 'Le type mime du fichier est incorrect…';
            }
        } else {
            require('./componants/co_bdd.php');
           $imageFileName = $_POST["imageDefault"];

            $req = "UPDATE articles SET title = ?,contenu = ?,image = ?,id_users = ? WHERE id = ?";
            $req = $bdd->prepare($req);
            $req->execute([
                $_POST["titre"],
                $_POST['contenu'],
                $imageFileName,
                $_SESSION["id"],
                $_POST['id']
            ]);
        header('location: index.php');
        }
    }
}

