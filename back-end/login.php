<?php
session_start();

include'connexion.php';
// Récupérer les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // Vérifier si l'utilisateur existe déjà
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Utilisateur trouvé, vérifier le mot de passe
        if ($password == $user["password"]) {
            $_SESSION["loggedin_user"] = [
                "email" => $user["email"],
                "name" => $user["name"]
            ];
            // Redirection ou gestion de la session après connexion
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION["loggin_error_message"] = "Invalid credentials!";
            header("Location: ../index.php#signup-form");
            exit();
        }
    } else {
        // L'utilisateur n'existe pas, on le crée
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $hashedPassword])) {
            echo "Registration successful! Logging in...";
            // Redirection vers une page après l'inscription
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "Error during registration.";
        }
    }
}
?>