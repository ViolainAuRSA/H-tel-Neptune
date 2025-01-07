<?php

    require_once 'include.php';
    require_once 'liens/essentials.php';

    // Vérification si l'utilisateur est connecté et est un administrateur
    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        // Rediriger vers la page de connexion ou une autre page
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Paramètres</title>
    <?php require 'liens/liens.php'; ?>
</head>
<body class="bg-light z-index-1">
    
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">Hôtel Neptune Admin Panel</h3>
    <a href="../logout.php" class="btn btn-light btn-sm">Déconnexion</a>
</div>

<div class="col-lg-2 bg-dark border-top border-3 border-secondary" style="height: 100%; position: fixed; @media screen and (max-width: 992px) {
    width: 100%; height: auto;}">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">Admin panel</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="rooms.php">Gestion des chambres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="demande_user.php">Demandes utilisateurs</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link text-white" href="settings.php">Paramètres</a>
                    </li>
                    <a href="../" class="btn btn-light btn-sm">Retour au site</a>
                </ul> 
            </div>
        </div>
    </nav>
</div>


<?php require 'liens/scripts.php'; ?>
</body>
</html>
