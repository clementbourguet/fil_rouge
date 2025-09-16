<?php

namespace App\Controller;

class ConnexionController {

    public function connexion() {
        // Logique pour afficher la page de réservation
        
        include "App/View/viewConnexion.php";
    }

    public function error404() {
        // Logique pour afficher une erreur 404 spécifique aux pages de réservation
        include "App/View/viewError404.php";
    }
}