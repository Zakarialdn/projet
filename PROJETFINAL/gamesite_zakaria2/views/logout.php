<?php session_start();
// Détruire toutes les variables de session
session_unset();
// Détruire la session
session_destroy();
// Rediriger vers la page de connexion ou la page d'accueil
header("Location: login.php");
exit();
