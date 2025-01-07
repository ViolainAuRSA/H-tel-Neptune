<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'liens/liens.php'; ?>
    <title>Hotel Neptune - Installations</title>
    <style>
        .pop {
            cursor: pointer;
            transition: all 0.3s;
        }
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">

    <?php require 'liens/header.php'; ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Mon Profil</h2>
        <div class="h-line bg-dark" style="width: 150px; margin: 0 auto; height: 1.7px;"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="card">
                    <img src="images/profil.jpg" alt="Profil" class="card-img-top">
                </div>
            </div>
        </div>
    </div>


    <?php require 'liens/footer.php'; ?>
</body>
</html>
