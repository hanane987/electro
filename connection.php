<?php
$host = "localhost"; // Adresse du serveur MySQL
$user = "root";      // Nom d'utilisateur MySQL
$password = "";      // Mot de passe MySQL
$dbname = "electro";    // Nom de la base de données

// Créer une connexion
$conn = new mysqli($host, $user, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


?>
