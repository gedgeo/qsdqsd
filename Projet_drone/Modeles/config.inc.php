<?php
$host = "172.18.58.7"; // Adresse du serveur
$dbname = "Projet_Drone_2025_"; // Nom de la base de données
$username = "snir"; // Nom d'utilisateur MySQL
$password = "snir"; // Mot de passe

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
