<?php
require_once 'include.php';

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Récupération des informations de l'utilisateur
$req = $DB->prepare("SELECT * FROM users WHERE id = ?");
$req->execute(array($_SESSION['id']));
$user = $req->fetch();

// Gestion des modifications
if (isset($_POST['modifier'])) {
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $telephone = htmlspecialchars($_POST['telephone'], ENT_QUOTES, 'UTF-8');
    
    $req = $DB->prepare("UPDATE users SET nom = :nom, email = :email, telephone = :telephone WHERE id = :id");
    $req->bindParam(':nom', $nom);
    $req->bindParam(':email', $email);
    $req->bindParam(':telephone', $telephone);
    $req->bindParam(':id', $_SESSION['id']);
    $req->execute();

    $_SESSION['success_message'] = "Profil modifié avec succès";
    header("Location: profil.php");
    exit();
}

// Gestion de la suppression
if (isset($_POST['delete'])) {
    $req = $DB->prepare("DELETE FROM users WHERE id = :id");
    $req->bindParam(':id', $_SESSION['id']);
    $req->execute();
    
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'liens/liens.php'; ?>
    <title>Hotel Neptune - Mon Profil</title>
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

    <!-- Affichage du message de succès -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success text-center" role="alert">
            <?= $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Nom complet</h5>
                        <p class="card-text"><?php echo $user['nom']; ?></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Email</h5>
                        <p class="card-text"><?php echo $user['email']; ?></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Téléphone</h5>
                        <p class="card-text"><?php echo $user['telephone']; ?></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Date de création</h5>
                        <p class="card-text"><?php echo $user['date_creation']; ?></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Date de dernière connexion</h5>
                        <p class="card-text"><?php echo $user['date_connexion']; ?></p>
                    </div>
                </div>
                <form method="post">
                    <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#ProfilSettings">Modifier</button>
                    <button type="submit" class="btn btn-danger shadow-none" name="delete">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modale de modification -->
    <div class="modal fade" id="ProfilSettings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier mon profil</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nom</label>
                            <input type="text" name="nom" id="nom_input" class="form-control shadow-none" value="<?php echo $user['nom']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email_input" class="form-control shadow-none" value="<?php echo $user['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Téléphone</label>
                            <input type="text" name="telephone" id="telephone_input" class="form-control shadow-none" value="<?php echo $user['telephone']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" name="modifier" class="btn custom-bg text-white shadow-none">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require 'liens/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('ProfilSettings');

            modal.addEventListener('hidden.bs.modal', function () {
                // Réinitialiser les valeurs des champs de la modale
                document.getElementById('nom_input').value = '<?php echo addslashes($user['nom']); ?>';
                document.getElementById('email_input').value = '<?php echo addslashes($user['email']); ?>';
                document.getElementById('telephone_input').value = '<?php echo addslashes($user['telephone']); ?>';
            });
        });
    </script>
</body>
</html>
