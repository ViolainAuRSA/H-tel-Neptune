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

    if (isset($_POST['submit1'])) {
        $adresse = htmlspecialchars($_POST['adresse'], ENT_QUOTES, 'UTF-8');
        $gmap = htmlspecialchars($_POST['gmap'], ENT_QUOTES, 'UTF-8');
        $telephone = htmlspecialchars($_POST['telephone'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $facebook = htmlspecialchars($_POST['facebook'], ENT_QUOTES, 'UTF-8');
        $insta = htmlspecialchars($_POST['insta'], ENT_QUOTES, 'UTF-8');
        $twitter = htmlspecialchars($_POST['twitter'], ENT_QUOTES, 'UTF-8');
        $linkedin = htmlspecialchars($_POST['linkedin'], ENT_QUOTES, 'UTF-8');
        $pinterest = htmlspecialchars($_POST['pinterest'], ENT_QUOTES, 'UTF-8');
        
        $req = $DB->prepare("UPDATE contact_details SET adresse = :adresse, gmap = :gmap, telephone = :telephone, email = :email, facebook = :facebook, insta = :insta, twitter = :twitter, linkedin = :linkedin, pinterest = :pinterest");
        $req->bindParam(':adresse', $adresse);
        $req->bindParam(':gmap', $gmap);
        $req->bindParam(':telephone', $telephone);
        $req->bindParam(':email', $email);
        $req->bindParam(':facebook', $facebook);
        $req->bindParam(':insta', $insta);
        $req->bindParam(':twitter', $twitter);
        $req->bindParam(':linkedin', $linkedin);
        $req->bindParam(':pinterest', $pinterest);
        $req->execute();

        $_SESSION['success_message'] = "Les paramètres de contact ont été mis à jour avec succès.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    $req = $DB->query("SELECT * FROM contact_details");
    $contact_details = $req->fetch();

    $adresse = $contact_details['adresse'];
    $gmap = $contact_details['gmap'];
    $telephone = $contact_details['telephone'];
    $email = $contact_details['email'];
    $facebook = $contact_details['facebook'];
    $insta = $contact_details['insta'];
    $twitter = $contact_details['twitter'];
    $linkedin = $contact_details['linkedin'];
    $pinterest = $contact_details['pinterest'];
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
                <div class="card border-0 shadow-sm mb-4">
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
                                        <label class="form-label fw-bold">Nom du site</label>
                                        <input 
                                            type="text" 
                                            name="site_title" 
                                            id="site_title_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $site_title; ?>" 
                                            onfocus="this.value='<?php echo addslashes($site_title); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">A propos</label>
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


                <!-- Contact settings-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Paramètres de contact</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contactSettings">
                                <i class="bi bi-pencil-square"></i> Modifier
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Adresse</h6>
                                    <p class="card-text" id="adresse"><?php echo $adresse; ?></p> 
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google map</h6>
                                    <p class="card-text" id="gmap"><?php echo $gmap; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Numéro de téléphone</h6>
                                    <p class="card-text"><i class="bi bi-telephone"></i> <?php echo $telephone; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Adresse email</h6>
                                    <p class="card-text"><i class="bi bi-envelope"></i> <?php echo $email; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Réseaux sociaux</h6>
                                    <p class="card-text"><i class="bi bi-facebook text-primary"></i> <?php echo $facebook; ?></p>
                                    <p class="card-text"><i class="bi bi-instagram text-danger"></i> <?php echo $insta; ?></p>
                                    <p class="card-text"><i class="bi bi-twitter text-info"></i> <?php echo $twitter; ?></p>
                                    <p class="card-text"><i class="bi bi-linkedin text-primary"></i> <?php echo $linkedin; ?></p>
                                    <p class="card-text"><i class="bi bi-pinterest text-danger"></i> <?php echo $pinterest; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal contact settings-->
                <div class="modal fade" id="contactSettings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Paramètres de contact</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Adresse</label>
                                        <input 
                                            type="text" 
                                            name="adresse" 
                                            id="adresse_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $adresse; ?>" 
                                            onfocus="this.value='<?php echo addslashes($adresse); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Google map</label>
                                        <textarea 
                                            name="gmap" 
                                            id="gmap_input" 
                                            class="form-control shadow-none" 
                                            rows="3" 
                                            onfocus="this.value='<?php echo addslashes($gmap); ?>'"><?php echo $gmap; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Numéro de téléphone</label>
                                        <input 
                                            type="text" 
                                            name="telephone" 
                                            id="telephone_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $telephone; ?>" 
                                            onfocus="this.value='<?php echo addslashes($telephone); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Adresse email</label>
                                        <input 
                                            type="email" 
                                            name="email" 
                                            id="email_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $email; ?>" 
                                            onfocus="this.value='<?php echo addslashes($email); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Facebook</label>
                                        <input 
                                            type="text" 
                                            name="facebook" 
                                            id="facebook_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $facebook; ?>" 
                                            onfocus="this.value='<?php echo addslashes($facebook); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Instagram</label>
                                        <input 
                                            type="text" 
                                            name="insta" 
                                            id="insta_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $insta; ?>" 
                                            onfocus="this.value='<?php echo addslashes($insta); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Twitter</label>
                                        <input 
                                            type="text" 
                                            name="twitter" 
                                            id="twitter_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $twitter; ?>" 
                                            onfocus="this.value='<?php echo addslashes($twitter); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Linkedin</label>
                                        <input 
                                            type="text" 
                                            name="linkedin" 
                                            id="linkedin_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $linkedin; ?>" 
                                            onfocus="this.value='<?php echo addslashes($linkedin); ?>'">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Pinterest</label>
                                        <input 
                                            type="text" 
                                            name="pinterest" 
                                            id="pinterest_input" 
                                            class="form-control shadow-none" 
                                            value="<?php echo $pinterest; ?>" 
                                            onfocus="this.value='<?php echo addslashes($pinterest); ?>'">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit1" name="submit1" class="btn custom-bg text-white shadow-none">Enregistrer</button>
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
                document.getElementById('adresse_input').value = '<?php echo addslashes($adresse); ?>';
                document.getElementById('gmap_input').value = '<?php echo addslashes($gmap); ?>';
                document.getElementById('telephone_input').value = '<?php echo addslashes($telephone); ?>';
                document.getElementById('email_input').value = '<?php echo addslashes($email); ?>';
                document.getElementById('facebook_input').value = '<?php echo addslashes($facebook); ?>';
                document.getElementById('insta_input').value = '<?php echo addslashes($insta); ?>';
                document.getElementById('twitter_input').value = '<?php echo addslashes($twitter); ?>';
                document.getElementById('linkedin_input').value = '<?php echo addslashes($linkedin); ?>';
                document.getElementById('pinterest_input').value = '<?php echo addslashes($pinterest); ?>';
            });
        });
    </script>

</body>
</html>
