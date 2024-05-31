<?php

// POUR VÉRIFIER LES ERREURS SUR PHP
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

// ON RÉCUPÈRE LA BASE DE DONNÉES ET LES FICHIERS
// Config
require('config/database.php');
// require('config/Core.php');
include_once('_config.php');
include_once("classes/router.php");
// Controllers
require('controllers/HomeController.php');
require('controllers/RegisterController.php');
require('controllers/LoginController.php');
require('controllers/ProfileController.php');
require('controllers/LogoutController.php');
require('controllers/ArticleController.php');

// CHARGEMENT DE LA CONFIGURATION ET L'AUTOLOAD
Autoloader::start();

$request = isset($_GET['url']) ? $_GET['url'] : 'home';

// Ici on se retrouve avec l'url de base index.php?r=...
//$request = $_GET['url']; //fait référence à index.php?url=...
// var_dump($request);

$router = new Router($request);
$router->renderControllers();
