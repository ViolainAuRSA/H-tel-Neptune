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
    $room_1 = htmlspecialchars($_POST['room_1'], ENT_QUOTES, 'UTF-8');
    $room_2 = htmlspecialchars($_POST['room_2'], ENT_QUOTES, 'UTF-8');
    $room_3 = htmlspecialchars($_POST['room_3'], ENT_QUOTES, 'UTF-8');
    $date_arrivee = htmlspecialchars($_POST['date_arrivee'], ENT_QUOTES, 'UTF-8');
    $date_depart = htmlspecialchars($_POST['date_depart'], ENT_QUOTES, 'UTF-8');

    $req = $DB->prepare("UPDATE users SET nom = ?, room_1 = ?, room_2 = ?, room_3 = ?, date_arrivee = ?, date_depart = ? WHERE id = ?");
    $req->execute(array($nom, $room_1, $room_2, $room_3, $date_arrivee, $date_depart, $id));

    $_SESSION['success_message'] = "Réservation modifiée avec succès";
    header("Location: mes_resa.php");
    exit();
}

if (isset($_POST['supprimer'])) {
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

    $req = $DB->prepare("UPDATE users SET room_1 = 0, room_2 = 0, room_3 = 0, date_arrivee = 0000-00-00, date_depart = 0000-00-00 WHERE id = ?");
    $req->execute(array($id));

    $_SESSION['success_message'] = "Réservation supprimée avec succès";
    header("Location: mes_resa.php");
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
            <h1>Gestion des réservations</h1>
            
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
                                    <th scope="col">Chambre 1</th>
                                    <th scope="col">Chambre 2</th>
                                    <th scope="col">Chambre 3</th>
                                    <th scope="col">Date d'arrivée</th>
                                    <th scope="col">Date de départ</th>
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
                                        <td><?= $demande['room_1']; ?></td>
                                        <td><?= $demande['room_2']; ?></td>
                                        <td><?= $demande['room_3']; ?></td>
                                        <td><?= $demande['date_arrivee']; ?></td>
                                        <td><?= $demande['date_depart']; ?></td>
                                        <td>
                                            <form method="POST" action="">
                                                <input type="hidden" name="id" value="<?= $demande['id']; ?>">
                                                <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#ProfilSettings" 
                                                    data-id="<?= $demande['id']; ?>" 
                                                    data-nom="<?= $demande['nom']; ?>" 
                                                    data-room_1="<?= $demande['room_1']; ?>" 
                                                    data-room_2="<?= $demande['room_2']; ?>" 
                                                    data-room_3="<?= $demande['room_3']; ?>" 
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
                        <label class="form-label fw-bold">Chambre 1</label>
                        <input type="text" name="room_1" id="modal_room_1" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Chambre 2</label>
                        <input type="text" name="room_2" id="modal_room_2" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Chambre 3</label>
                        <input type="text" name="room_3" id="modal_room_3" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date d'arrivée</label>
                        <input type="date" name="date_arrivee" id="modal_date_arrivee" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date de départ</label>
                        <input type="date" name="date_depart" id="modal_date_depart" class="form-control shadow-none">
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
            const room_1 = button.getAttribute('data-room_1');
            const room_2 = button.getAttribute('data-room_2');
            const room_3 = button.getAttribute('data-room_3');
            const date_arrivee = button.getAttribute('data-date_arrivee');
            const date_depart = button.getAttribute('data-date_depart');

            document.getElementById('modal_id').value = id;
            document.getElementById('modal_nom').value = nom;
            document.getElementById('modal_room_1').value = room_1;
            document.getElementById('modal_room_2').value = room_2;
            document.getElementById('modal_room_3').value = room_3;
            document.getElementById('modal_date_arrivee').value = date_arrivee;
            document.getElementById('modal_date_depart').value = date_depart;
        });
    });
</script>

</body>
</html>
