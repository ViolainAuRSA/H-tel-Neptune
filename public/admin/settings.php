<?php
require_once 'include.php';
require_once 'liens/essentials.php';

// Vérification si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    // Rediriger vers la page de connexion ou une autre page
    header("Location: ../index.php");
    exit();
}

// Récupération des paramètres actuels
$req = $DB->query("SELECT * FROM settings");
$settings = $req->fetch();

$site_title = $settings['site_title'];
$site_about = $settings['site_about'];

// Traitement de la soumission du formulaire
if (isset($_POST['submit'])) {
    $site_title = htmlspecialchars($_POST['site_title'], ENT_QUOTES, 'UTF-8');
    $site_about = htmlspecialchars($_POST['site_about'], ENT_QUOTES, 'UTF-8');

    $req = $DB->prepare("UPDATE settings SET site_title = :site_title, site_about = :site_about");
    $req->bindParam(':site_title', $site_title);
    $req->bindParam(':site_about', $site_about);
    $req->execute();

    // Ajouter un message de confirmation
    $_SESSION['success_message'] = "Les paramètres ont été mis à jour avec succès.";

    // Actualiser la page
    header("Location: " . $_SERVER['PHP_SELF']);
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
                <h3 class="mb-4">Paramètres</h3>

                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php 
                            echo $_SESSION['success_message']; 
                            unset($_SESSION['success_message']); // Supprimer le message après affichage
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>


                <!-- Paramètres généraux -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Paramètres généraux</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#generalSettings">
                                <i class="bi bi-pencil-square"></i> Modifier
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Nom du site</h6>
                        <p class="card-text" id="site_title"><?php echo $site_title; ?></p>
                        <h6 class="card-subtitle mb-1 fw-bold">A propos de nous</h6>
                        <p class="card-text" id="site_about"><?php echo $site_about; ?></p>
                    </div>
                </div>

                <!-- Modal paramètres généraux -->
                <div class="modal fade" id="generalSettings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Paramètres généraux</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nom du site</label>
                                        <input 
                                            type="text" 
                                            name="site_title" 
                                            id="site_title_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $site_title; ?>" 
                                            onfocus="this.value='<?php echo addslashes($site_title); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">A propos</label>
                                        <textarea 
                                            name="site_about" 
                                            id="site_about_input" 
                                            class="form-control shadow-none" 
                                            rows="6" 
                                            onfocus="this.value='<?php echo addslashes($site_about); ?>'"><?php echo $site_about; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" name="submit" class="btn custom-bg text-white shadow-none">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require 'liens/scripts.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('generalSettings');

        modal.addEventListener('hidden.bs.modal', function () {
            // Réinitialiser les valeurs des champs de la modale
            document.getElementById('site_title_input').value = '<?php echo addslashes($site_title); ?>';
            document.getElementById('site_about_input').value = '<?php echo addslashes($site_about); ?>';
        });
    });
</script>

</body>
</html>
