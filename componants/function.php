<?php 

function getUsers(){
    global $bdd;
    $req = "SELECT * FROM users";
    $query = $bdd->query($req);
    $users = $query->fetchAll(); 
    return $users; 
}

function getUser($id){
    global $bdd; 
    $req = "SELECT * FROM users WHERE id = ?";
    $query = $bdd->prepare($req);
    $query->execute([
        $id
    ]);
    $user = $query->fetch(); 
    return $user; 
}

function getPosts($bdd)
{
    $req = "SELECT articles.*,users.id as uid,users.name FROM articles INNER JOIN users ON users.id = articles.id_users"; 
    $query = $bdd -> query($req); 
    $articles = $query -> fetchAll(); 
    return $articles; 
}

function getPost($dd,$id){
    $req = "SELECT * FROM articles WHERE id = ?";
    $req = $dd->prepare($req);
    $req->execute([
       $id
    ]);
    $article = $req->fetch();
    return $article; 
}


function getMyArticles($bdd,$id){
    $req = "SELECT * FROM articles WHERE id_users = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id
    ]); 
    $articles = $req -> fetchAll(); 
    return $articles; 
}



function getMyArticle($bdd, $id)
{
    $req = "SELECT * FROM articles WHERE id = ?";
    $req = $bdd->prepare($req);
    $req->execute([
        $id
    ]);
    $article = $req->fetch();
    return $article;
}
function deleteArticle($bdd,$id,$idUser){
    $req = "DELETE FROM articles WHERE id = ? AND id_users = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id,
        $idUser
    ]); 
}