<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=UTF8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}