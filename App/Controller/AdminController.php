<?php

namespace App\Controller;

use App\Model\Prestations;

class AdminController
{
    public function dashboard()
    {
        session_start();

        // Vérifier si connecté et admin
        if (!isset($_SESSION['connected']) || (int)$_SESSION['id_roles'] !== 2) {
            header("Location: " . BASE_URL . "/");
            exit;
        }

        $prestationsModel = new Services();
        $prestations = $prestationsModel->getAllPrestations(); // méthode à créer

        include "App/View/adminDashboard.php";
    }
}
