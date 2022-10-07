<?php 
var_dump($_POST);
//Etape 1
if(isset($_POST["email"],$_POST['password'],$_POST['name']) && !empty($_POST["email"]) && !empty($_POST['password']) && !empty($_POST["name"])){

    // etape 2
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        // ETAPE 3 
        require('./componants/co_bdd.php');
        
        // etape 4
        $req = "SELECT * FROM users WHERE email = ?"; 
        $query = $bdd -> prepare($req); 
        $query -> execute([
            $_POST['email']
        ]); 
        $user = $query ->fetch(); 
        

        if(!$user){
            $req = "INSERT INTO users(name,email,password) VALUES (?,?,?)"; 
            $query = $bdd -> prepare($req); 
            $query -> execute([
                $_POST['name'],
                $_POST['email'],
                password_hash($_POST["password"],PASSWORD_DEFAULT)
            ]); 
        }
    }

}
var_dump(password_hash("azerty",PASSWORD_BCRYPT)); 