<?php

//importer les ressources
include "./env.php";

include "./vendor/autoload.php";
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test si l'url posséde une route sinon on renvoi à la racine
$path = $url['path'] ?? '/';




use App\Controller\HomeController;
use App\Controller\BookController;
use App\Controller\ConnexionController;



$homeController = new HomeController();
$bookController = new BookController();
$ConnexionController = new ConnexionController();



if ( !isset($_SESSION["connected"])) {
    switch (substr($path, strlen(BASE_URL))) {
        case "/":
            $homeController->home();
            break;
        case "/connexion":
            $ConnexionController->connexion();
            break;
            case "/book":
            $bookController->book();
            break;
        default:
            $homeController->error404();
            break;
    }
} else {
    switch (substr($path, strlen(BASE_URL))) {
        case "/":
            $homeController->home();
            break;
        case "/connexion":
            $ConnexionController->connexion();
            break;
        case "/book":
            $bookController->book();
            break;
        default:
            $homeController->error404();
            break;
    }
}