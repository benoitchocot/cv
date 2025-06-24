<?php
include "config.php"; // Inclut session_start(), ADMIN_USER et ADMIN_PASS_HASH

$error = ""; // Initialiser la variable d'erreur

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]); // trim pour enlever les espaces
    $password = $_POST["password"]; // Pas de trim sur le mot de passe généralement

    // Vérifier le nom d'utilisateur et le hash du mot de passe
    if ($username === ADMIN_USER && password_verify($password, ADMIN_PASS_HASH)) {
        // Mot de passe correct
        
        session_regenerate_id(true); // Régénérer l'ID de session pour la sécurité
        
        $_SESSION["admin"] = true;
        header("Location: index.php");
        exit;
    } else {
        // Identifiants incorrects
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion Admin</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Identifiant" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
