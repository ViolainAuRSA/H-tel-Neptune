<?php
require_once 'include.php';
require_once 'liens/essentials.php';

// Vérification si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    // Rediriger vers la page de connexion ou une autre page
    header("Location: ../index.php");
    exit();
}

$service = $DB->query("SELECT * FROM services");
$service = $service->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Gestion des services</title>
    <?php require 'liens/liens.php'; ?>
</head>
<body class="bg-light">
    
<?php require 'liens/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h1>Gestion des services</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <div class="table-responsive-md" style="overflow-y: scroll; height: 450px;">
                        <table class="table table-hover border"> 
                            <thead class="sticky-top">
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($service as $service): ?>
                                    <tr>
                                        <td><?php echo $service['id']; ?></td>
                                        <td><?php echo $service['nom']; ?></td>
                                        <td><?php echo $service['icon']; ?></td>
                                        <td>
                                            <button type="button" name="edit" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#serviceModal">Modifier</button>
                                            <button type="button" name="delete" class="btn btn-danger shadow-none" data-bs-toggle="modal" data-bs-target="#">Supprimer</button>
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
<div class="modal fade" id="serviceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="serviceForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control shadow-none" name="nom" id="nom" required >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <input type="file" class="form-control shadow-none" name="icon" id="icon" required >
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

<?php require 'liens/scripts.php'; ?>
</body>
</html>
