<?php
require_once 'include.php';

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$req = $DB->prepare("SELECT * FROM users WHERE id = ?");
$req->execute(array($_SESSION['id']));
$user = $req->fetch();


if(isset($_POST['annuler_resa_1'])){
    $req = $DB->prepare("UPDATE users SET date_arrivee = 0000-00-00, date_depart = 0000-00-00, room_1 = 0 WHERE id = ?");
    $req->execute(array($_SESSION['id']));
    header('Location: mes_resa.php');
    exit();
}

if(isset($_POST['annuler_resa_2'])){
    $req = $DB->prepare("UPDATE users SET room_2 = 0, date_arrivee = 0000-00-00, date_depart = 0000-00-00 WHERE id = ?");
    $req->execute(array($_SESSION['id']));
    header('Location: mes_resa.php');
    exit();
}

if(isset($_POST['annuler_resa_3'])){
    $req = $DB->prepare("UPDATE users SET room_3 = 0, date_arrivee = 0000-00-00, date_depart = 0000-00-00 WHERE id = ?");
    $req->execute(array($_SESSION['id']));
    header('Location: mes_resa.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'liens/liens.php'; ?>
    <title>Hotel Neptune - Mes réservations</title>
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
        .calendar-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            width: 100%;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
        }
        .calendar .day {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
        .calendar .day.selected {
            background-color: var(--teal);
            color: white;
            font-weight: bold;
        }
        .calendar .day:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }
        .calendar-header {
            text-align: center;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">

    <?php require 'liens/header.php'; ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Mes réservations</h2>
        <div class="h-line bg-dark" style="width: 150px; margin: 0 auto; height: 1.7px;"></div>
    </div>
    <?php if($user['room_1'] == 0 && $user['room_2'] == 0 && $user['room_3'] == 0){
        echo "<div class='alert alert-warning text-center' role='alert'>
                Vous n'avez pas encore réservé de chambre.
            </div>";
    } ?>

    <!-- Affichage du message de succès -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success text-center" role="alert">
            <?= $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <?php if($user['date_arrivee'] != '0000-00-00' && $user['date_depart'] != '0000-00-00'){ ?>
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-lg-12 col-md-6 mb-5 px-4">
                    <div class="card">
                        <div class="row">
                            <div class="calendar-container">
                                <div class="calendar">
                                    <?php
                                    // Dates à afficher
                                    $startDate = new DateTime($user['date_arrivee']);
                                    $endDate = new DateTime($user['date_depart']);
                                    $interval = $endDate->diff($startDate)->days;

                                    // Générer les jours du mois
                                    $monthStart = (clone $startDate)->modify('first day of this month');
                                    $monthEnd = (clone $endDate)->modify('last day of this month');

                                    // Afficher un calendrier
                                    $currentDate = $monthStart;
                                    while ($currentDate <= $monthEnd) {
                                        $class = '';

                                        // Marquer les jours sélectionnés
                                        if ($currentDate >= $startDate && $currentDate <= $endDate) {
                                            $class = 'selected';
                                        }

                                        // Afficher chaque jour
                                        echo "<div class='day $class'>" . $currentDate->format('d') . "</div>";
                                        $currentDate->modify('+1 day');
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            if($user['room_1'] == 1){?>
                                <div class="card border-0 shadow">
                                    <div class="row g-0 p-3 align-items-center">
                                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                                        </div>
                                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                            <h5 class="mb-1">Chambre Standard n°1</h5>
                                            <div class="features mb-3">
                                                <h6 class="mb-1">Caractéristiques</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    1 lit double
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    Salle de bain
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    Douche à l'italienne
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    20 m² 
                                                </span>
                                            </div>
                                            <div class="facilities mb-3">
                                                <h6 class="mb-1">Services</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    Petit déjeuner
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    Accès à la piscine
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    Wifi
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    Climatisation
                                                </span>
                                            </div>
                                            <div class="guests">
                                                <h6 class="mb-1">Nombre de personnes</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    2 adultes
                                                </span>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    1 enfant
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                            <form method="POST">
                                                <button class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#Reservation1Settings">Modifier la réservation</button>
                                                <button class="btn btn-sm w-100 btn-outline-dark shadow-none" name="annuler_resa_1">Annuler la réservation</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?> 
                        <?php if($user['room_2'] == 1){?>
                            <div class="card mb-4 border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                        <img src="img/rooms/1.png" class="img-fluid rounded" style="height: 250px;">
                                    </div>
                                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="mb-1">Chambre Confort n°13</h5>
                                        <div class="features mb-3">
                                            <h6 class="mb-1">Caractéristiques</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                1 lit double
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Salle de bain
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Douche à l'italienne
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                30 m² 
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Bureau
                                            </span>
                                        </div>
                                        <div class="facilities mb-3">
                                            <h6 class="mb-1">Services</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Petit déjeuner
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Accès à la piscine
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Wifi
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                TV
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Climatisation
                                            </span>
                                        </div>
                                        <div class="guests">
                                            <h6 class="mb-1">Nombre de personnes</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                2 adultes
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                1 enfant
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                        <form method="POST">
                                            <button class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#Reservation2Settings">Modifier la réservation</button>
                                            <button class="btn btn-sm w-100 btn-outline-dark shadow-none" name="annuler_resa_2">Annuler la réservation</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($user['room_3'] == 1){ ?>
                            <div class="card mb-4 border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                        <img src="img/rooms/3.png" class="img-fluid rounded" style="height: 250px;">
                                    </div>
                                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="mb-1">Chambre Premium n°22</h5>
                                        <div class="features mb-3">
                                            <h6 class="mb-1">Caractéristiques</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                2 lits doubles
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Salle de bain
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Douche à l'italienne ou baignoire
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                40 m² 
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Balcon
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Sofa
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Table de travail
                                            </span>
                                        </div>
                                        <div class="facilities mb-3">
                                            <h6 class="mb-1">Services</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Petit déjeuner en chambre
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Accès à la piscine
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Wifi
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                TV
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                Climatisation
                                            </span>
                                        </div>
                                        <div class="guests">
                                            <h6 class="mb-1">Nombre de personnes</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                4 adultes
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                2 enfants
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                        <form method="POST">
                                            <button class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#Reservation3Settings">Modifier la réservation</button>
                                            <button class="btn btn-sm w-100 btn-outline-dark shadow-none" name="annuler_resa_3">Annuler la réservation</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modales -->

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
