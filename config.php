<?php
session_start();

// Identifiants de l'administrateur
define("ADMIN_USER", "bonoit");
define("ADMIN_PASS_HASH", '$2y$10$/U6hP64Hz5WXQcdf1IAZ0OgoTRyJF8K0fp5666N.PFE.uDf9JAXT6');

// Vérifier si l'utilisateur est connecté
function isAdmin() {
    return isset($_SESSION["admin"]) && $_SESSION["admin"] === true;
}
?>
