<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        .user-info {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Bienvenue sur notre site</h1>

    <?php if(isset($_SESSION['user'])): ?>
        <div class="user-info">
            <h3>Informations de l'utilisateur :</h3>
            <p>Nom : <?php echo $_SESSION['user']['nom']; ?></p>
            <p>Prénom : <?php echo $_SESSION['user']['prenom']; ?></p>
            <p>Email : <?php echo $_SESSION['user']['email']; ?></p>
        </div>
    <?php endif; ?>

    <p><a href="Register.php">S'inscrire</a></p>
</body>

</html>