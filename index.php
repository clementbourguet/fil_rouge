<?php

// Importer les ressources
include "./env.php";
include "./vendor/autoload.php";

session_start();
// Analyse de l'URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Calcul du chemin relatif par rapport à BASE_URL
$relativePath = substr($path, strlen(BASE_URL)); // supprime /reflexology
$relativePath = '/' . ltrim($relativePath, '/'); // assure un / devant
$relativePath = rtrim($relativePath, '/'); // supprime slash final
$relativePath = $relativePath === '' ? '/' : $relativePath; // si vide → '/'

// Import des controllers
use App\Controller\HomeController;
use App\Controller\RegisterController;
use App\Controller\ConnexionController;
use App\Controller\BookController;
use App\Controller\DeconnexionController;
use App\Controller\AdminController;

$homeController = new HomeController();
$registerController = new RegisterController();
$ConnexionController = new ConnexionController();
$bookController = new BookController();
$deconnexionController = new DeconnexionController();
$adminController = new AdminController();

// Routing
if (!isset($_SESSION["connected"])) {
    // Déconnectés : peuvent accéder à inscription et connexion
    switch ($relativePath) {
        case '/':
            $homeController->home();
            break;
        case '/inscription':
            $registerController->register();
            break;
        case '/connexion':
            $ConnexionController->connexion();
            break;
        case '/book':
            $bookController->book();
            break;
        default:
            $homeController->error404();
            break;
    }
} else {
    // Connectés : ne peuvent pas accéder à inscription/connexion
    switch ($relativePath) {
        case '/':
            $homeController->home();
            break;
        case '/book':
            $bookController->book();
            break;
        case '/admin':
            $adminController = new AdminController();
            $adminController->dashboard();
            break;
        case '/deconnexion':
            $deconnexionController->logout();
            break;
        default:
            $homeController->error404();
            break;
    }
}
