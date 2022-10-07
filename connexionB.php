<?php
session_start(); 

// etape 1: verifier que tout est rempli
 if(isset($_POST['email'],$_POST['password'])){
    require('./componants/co_bdd.php'); 
    // etape 2 : recuperer l'utilisateur par rapport a son email 
    $req = "SELECT * FROM users WHERE email = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $_POST['email']
    ]); 
    $user = $req -> fetch(); 
    // eTAPE 3 verifier si il existe
    if($user){
       
        // etape 4 : verifier si il a rentrer le bon mot de passe 
        if(password_verify($_POST['password'],$user['password'])){
    
            // etape 5 : creer des variables de session grace au valeur qu'on a recupere 
            $_SESSION['id'] = $user['id']; 
            $_SESSION['name'] = $user['name']; 
            $_SESSION["email"] = $user['email'];   
            header('location: index.php?success=co'); 
         
        }
    }
 }