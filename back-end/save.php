<?php
include'connexion.php';

// Récupérer les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // Requête pour vérifier si l'utilisateur existe
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ? AND name = ? AND password = ?");
    $stmt->execute([$email, $name, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Si l'utilisateur existe, connexion réussie
        echo "Login successful!";
        // Redirection vers une autre page ou gestion de la session ici
    } else {
        // Si l'utilisateur n'existe pas, redirection vers la page d'enregistrement
        header("Location: register.php?name=$name&email=$email&pwd=$password");
        exit();
    }
}
?>
