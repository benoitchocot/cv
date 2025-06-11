<?php
session_start();

// Identifiants de l'administrateur
define("ADMIN_USER", "bonoit");
define("ADMIN_PASS", "Benoit45+"); // ⚠️ Change ce mot de passe !

// Vérifier si l'utilisateur est connecté
function isAdmin() {
    return isset($_SESSION["admin"]) && $_SESSION["admin"] === true;
}
?>
