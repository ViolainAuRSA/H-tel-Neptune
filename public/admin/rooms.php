<?php
require_once 'include.php';
require_once 'liens/essentials.php';

// Vérification si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    // Rediriger vers la page de connexion ou une autre page
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['add_room'])){
    $nom = $_POST['name'];
    $caracteristiques = $_POST['description'];
    $service = $_POST['service'];
    $personnes = $_POST['personnes'];
    $enfants = $_POST['enfants'];
    $prix = $_POST['prix'];
    $status = $_POST['status'];

    $req = $DB->prepare("UPDATE chambres SET nom = ?, caracteristiques = ?, service = ?, personnes = ?, enfants = ?, prix = ?, status = ? WHERE id = ?");
    $req->execute(array($nom, $caracteristiques, $service, $personnes, $enfants, $prix, $image, $status, $id));
    header("Location: rooms.php");
    exit();
}

$req = $DB->query("SELECT * FROM caracteristiques");
$caracteristiques = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Gestion des chambres</title>
    <?php require 'liens/liens.php'; ?>
</head>
<body class="bg-light">
    
<?php require 'liens/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h1>Gestion des chambres</h1>
            <?php if(isset($_SESSION['add_room'])): ?>
                <div class="alert alert-success">
                    Chambre ajoutée avec succès
                </div>
            <?php endif; ?>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#roomModal">Ajouter une chambre</button>
                    <div class="table-responsive-md" style="overflow-y: scroll; height: 450px;">
                        <table class="table table-hover border"> 
                            <thead class="sticky-top">
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Caractéristiques</th>
                                    <th scope="col">Nombre d'adultes</th>
                                    <th scope="col">Nombre d'enfants</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php 
                                $rooms = $DB->query("SELECT * FROM chambres");
                                $rooms = $rooms->fetchAll();
                                $i = 1;
                            ?>
                            <tbody>
                                <?php foreach($rooms as $room): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $room['nom']; ?></td>
                                        <td>
                                            <?php echo $caracteristiques[1]['nom']; ?>
                                            <?php echo $caracteristiques[5]['nom']; ?>
                                            <?php echo $caracteristiques[6]['nom']; ?>
                                            <?php echo $caracteristiques[7]['nom']; ?>
                                        </td>
                                        <td><?php echo $room['adultes']; ?></td>
                                        <td><?php echo $room['enfant']; ?></td>
                                        <td><?php echo $room['prix']; ?></td>
                                        <td><?php echo $room['status']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#roomModal">Modifier</button>
                                            <button type="button" class="btn btn-danger shadow-none" data-bs-toggle="modal" data-bs-target="#roomModal">Supprimer</button>
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
<div class="modal fade" id="roomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="roomForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une chambre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Caractéristiques</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="personnes" class="form-label">Nombre d'adultes</label>
                        <input type="number" class="form-control" id="personnes" name="personnes" required>
                    </div>
                    <div class="mb-3">
                        <label for="enfants" class="form-label">Nombre d'enfants</label>
                        <input type="number" class="form-control" id="enfants" name="enfants" required>
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="prix" name="prix" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Disponible</option>
                            <option value="0">Indisponible</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="add_room" name="add_room" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'liens/scripts.php'; ?>
</body>
</html>
