<?php

namespace App\Controller;

class BookController {

    public function book() {
        // Logique pour afficher la page de réservation
        
        include "App/View/viewBook.php";
    }

    public function error404() {
        // Logique pour afficher une erreur 404 spécifique aux pages de réservation
        include "App/View/viewError404.php";
    }
}