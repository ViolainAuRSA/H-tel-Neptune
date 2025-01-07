<?php
require_once 'include.php';
require_once 'liens/essentials.php';

// Vérification si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: ../index.php");
    exit();
}

// Gestion des actions (modifier ou supprimer)
if (isset($_POST['modifier'])) {
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $telephone = htmlspecialchars($_POST['telephone'], ENT_QUOTES, 'UTF-8');
    $mot_de_passe = htmlspecialchars($_POST['mot_de_passe'], ENT_QUOTES, 'UTF-8');

    if (!empty($mot_de_passe)) {
        // Hachage du mot de passe avant de le sauvegarder
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $req = $DB->prepare("UPDATE users SET nom = ?, email = ?, telephone = ?, mot_de_passe = ? WHERE id = ?");
        $req->execute(array($nom, $email, $telephone, $mot_de_passe_hache, $id));
    } else {
        // Si aucun mot de passe n'est fourni, ne pas modifier le mot de passe
        $req = $DB->prepare("UPDATE users SET nom = ?, email = ?, telephone = ? WHERE id = ?");
        $req->execute(array($nom, $email, $telephone, $id));
    }

    $_SESSION['success_message'] = "Utilisateur modifié avec succès";
    header("Location: profil.php");
    exit();
}

if (isset($_POST['supprimer'])) {
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

    $req = $DB->prepare("DELETE FROM users WHERE id = ?");
    $req->execute(array($id));

    $_SESSION['success_message'] = "Utilisateur supprimé avec succès";
    header("Location: profil.php");
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
            <h1>Gestion des utilisateurs</h1>
            
            <!-- Message de succès -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= $_SESSION['success_message']; ?>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="table-responsive-md" style="overflow-y: scroll; height: 450px;">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Date de connexion</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $demandes = $DB->query("SELECT * FROM users");
                                    foreach ($demandes as $demande): ?>
                                    <tr>
                                        <td><?= $demande['id']; ?></td>
                                        <td><?= $demande['nom']; ?></td>
                                        <td><?= $demande['email']; ?></td>
                                        <td><?= $demande['telephone']; ?></td>
                                        <td><?= $demande['date_creation']; ?></td>
                                        <td><?= $demande['date_connexion']; ?></td>
                                        <td>
                                            <form method="POST" action="">
                                                <input type="hidden" name="id" value="<?= $demande['id']; ?>">
                                                <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#ProfilSettings" 
                                                    data-id="<?= $demande['id']; ?>" 
                                                    data-nom="<?= $demande['nom']; ?>" 
                                                    data-email="<?= $demande['email']; ?>" 
                                                    data-telephone="<?= $demande['telephone']; ?>">Modifier</button>
                                                <button class="btn btn-danger shadow-none" type="submit" name="supprimer">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ProfilSettings" tabindex="-1" aria-labelledby="ProfilSettingsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier un utilisateur</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="modal_id">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom</label>
                        <input type="text" name="nom" id="modal_nom" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" id="modal_email" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Téléphone</label>
                        <input type="text" name="telephone" id="modal_telephone" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                        <input type="text" name="mot_de_passe" id="modal_mot_de_passe" class="form-control shadow-none">
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

<?php require 'liens/scripts.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ProfilSettings = document.getElementById('ProfilSettings');
        ProfilSettings.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nom = button.getAttribute('data-nom');
            const email = button.getAttribute('data-email');
            const telephone = button.getAttribute('data-telephone');

            document.getElementById('modal_id').value = id;
            document.getElementById('modal_nom').value = nom;
            document.getElementById('modal_email').value = email;
            document.getElementById('modal_telephone').value = telephone;
            document.getElementById('modal_mot_de_passe').value = ""; // Réinitialiser le champ mot de passe
        });
    });
</script>

</body>
</html>
