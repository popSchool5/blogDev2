<?php 
session_start(); 
if(isset($_POST['titre']) && isset($_POST["contenu"])){
    // Si la clé image existe dans le tableau $_FILES
    // var_dump($_FILES); 
    if (array_key_exists('image', $_FILES)) {
        // Si il n'ya pas d'erreur 
        if ($_FILES['image']['error'] == 0) {
            // ICI
            if (in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/png', 'image/jpeg'])) {
                // Si la taille de l'image n'est pas sup a 3M
                if ($_FILES['image']['size'] <= 3000000) {
                    require('./componants/co_bdd.php'); 
                    // Genere un nom d'image qu'on stock dans $imageFileName
                    $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                    // Envoi du fichier dans le dossier : uploads/
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageFileName);

                    $req = "INSERT INTO articles(title,contenu,image,id_users) VALUES (?,?,?,?)"; 
                    $req = $bdd -> prepare($req); 
                    $req -> execute([
                        $_POST["titre"],
                        $_POST['contenu'],
                        $imageFileName, 
                        $_SESSION["id"]
                    ]); 
                    header('location: index.php'); 

                } else {
                    echo 'Le fichier est trop volumineux…';
                }
            } else {
                echo 'Le type mime du fichier est incorrect…';
            }
        } else {
            echo 'Le fichier n\'a pas pu être récupéré…';
        }
    }


}