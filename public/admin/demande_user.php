<?php
require_once 'include.php';
require_once 'liens/essentials.php';

// Vérification si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    // Rediriger vers la page de connexion ou une autre page
    header("Location: ../index.php");
    exit();
}

// Traitement des actions du formulaire
if (isset($_POST['vue'])) {
    $sr_no = $_POST['sr_no']; // Récupérer l'ID de la demande

    // Mettre à jour le statut de "vu" à 1 (Lu)
    try {
        $req = $DB->prepare("UPDATE demande_user SET vu = 1 WHERE sr_no = :sr_no");
        $req->bindParam(':sr_no', $sr_no);
        $req->execute();
    } catch (Exception $e) {
        echo "Erreur lors de la mise à jour: " . $e->getMessage(); // Erreur SQL
    }
}

if (isset($_POST['supprimer'])) {
    $sr_no = $_POST['sr_no']; // Récupérer l'ID de la demande

    // Supprimer la demande
    try {
        $req = $DB->prepare("DELETE FROM demande_user WHERE sr_no = :sr_no");
        $req->bindParam(':sr_no', $sr_no);
        $req->execute();
    } catch (Exception $e) {
        echo "Erreur lors de la suppression: " . $e->getMessage(); // Erreur SQL
    }
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
            <h1>Demandes utilisateurs</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <div class="table-responsive-md" style="overflow-y: scroll; height: 450px;">
                        <table class="table table-hover border"> 
                            <thead class="sticky-top">
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Sujet</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Vu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $demandes = $DB->query("SELECT * FROM demande_user");
                                    foreach ($demandes as $demande) {
                                        echo "<tr>";
                                        echo "<td>" . $demande['sr_no'] . "</td>";
                                        echo "<td>" . $demande['name'] . "</td>";
                                        echo "<td>" . $demande['email'] . "</td>";
                                        echo "<td>" . $demande['sujet'] . "</td>";
                                        echo "<td>" . $demande['message'] . "</td>";
                                        echo "<td>" . $demande['date'] . "</td>";
                                        if ($demande['vu'] == 1) {
                                            echo "<td><span class='badge bg-success'>Lu</span></td>";
                                        } else {
                                            echo "<td><span class='badge bg-info'>Non lu</span></td>";
                                        }
                                        echo "<td>";
                                        echo "<form method='POST' action=''>
                                                <input type='hidden' name='sr_no' value='" . $demande['sr_no'] . "'>
                                                <button class='btn btn-primary shadow-none' type='submit' name='vue'>Marquer comme lu</button>
                                                <button class='btn btn-danger shadow-none' type='submit' name='supprimer'>Supprimer</button>
                                              </form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require 'liens/scripts.php'; ?>
</body>
</html>
