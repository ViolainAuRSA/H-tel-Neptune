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
    <title>Admin Panel - Dashboard</title>
    <?php require 'liens/liens.php'; ?>
</head>
<body class="bg-light">
    

<?php require 'liens/header.php'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>


<?php require 'liens/scripts.php'; ?>
</body>
</html>
