<?php
// Connexion à la base de données avec PDO
$host = 'localhost';
$dbname = 'adventureseek'; // Remplacez par le nom de votre base de données
$username = 'root'; // Nom d'utilisateur
$password = ''; // Mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}

?>

