<?php
require_once 'include.php';

$caracteristiques = $DB->query("SELECT * FROM caracteristiques");
$caracteristiques = $caracteristiques->fetchAll();

// Initialisation des variables
$date_arrivee = isset($_POST['date_arrivee']) ? $_POST['date_arrivee'] : '';
$date_depart = isset($_POST['date_depart']) ? $_POST['date_depart'] : '';
$message = '';

$req = $DB->prepare("SELECT * FROM users WHERE id = ?");
$req->execute(array($_SESSION['id']));
$user = $req->fetch();

if($user['room_1'] == 0 && $user['room_2'] == 0 && $user['room_3'] == 0){
    if (isset($_POST['reserve1'])) {
        if (!empty($date_arrivee) && !empty($date_depart)) {
            $room_1 = 1; // Numéro de chambre (exemple: chambre 1)
    
            // Insertion des données dans la BDD
            $req = $DB->prepare("UPDATE users SET room_1 = :room, date_arrivee = :date_arrivee, date_depart = :date_depart");
            $req->execute([
                ':room' => $room_1,
                ':date_arrivee' => $date_arrivee,
                ':date_depart' => $date_depart
            ]);
    
            $message = "La réservation a été enregistrée avec succès.";
        } else {
            $message = "Veuillez renseigner une date d'arrivée et une date de départ.";
        }
    }
    if (isset($_POST['reserve2'])) {
        if (!empty($date_arrivee) && !empty($date_depart)) {
            $room_2 = 1; // Numéro de chambre (exemple: chambre 1)
    
            // Insertion des données dans la BDD
            $req = $DB->prepare("UPDATE users SET room_2 = :room, date_arrivee = :date_arrivee, date_depart = :date_depart");
            $req->execute([
                ':room' => $room_2,
                ':date_arrivee' => $date_arrivee,
                ':date_depart' => $date_depart
            ]);
    
            $message = "La réservation a été enregistrée avec succès.";
        } else {
            $message = "Veuillez renseigner une date d'arrivée et une date de départ.";
        }
    }
    
    if (isset($_POST['reserve3'])) {
        if (!empty($date_arrivee) && !empty($date_depart)) {
            $room_3 = 1; // Numéro de chambre (exemple: chambre 1)
    
            // Insertion des données dans la BDD
            $req = $DB->prepare("UPDATE users SET room_3 = :room, date_arrivee = :date_arrivee, date_depart = :date_depart");
            $req->execute([
                ':room' => $room_3,
                ':date_arrivee' => $date_arrivee,
                ':date_depart' => $date_depart
            ]);
    
            $message = "La réservation a été enregistrée avec succès.";
        } else {
            $message = "Veuillez renseigner une date d'arrivée et une date de départ.";
        }
    }
}
else {
    $message = "Vous avez déjà réservé une chambre.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'liens/liens.php'; ?>
    <title>Hotel Neptune - Chambres</title>
</head>
<body class="bg-light">
    <?php require 'liens/header.php'; ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Nos chambres</h2>
        <div class="h-line bg-dark" style="width: 150px; margin: 0 auto; height: 1.7px;"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <form method="POST">
                            <h4 class="mt-2">Filtres</h4>
                            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Vérifier les disponibilités</h5>
                                    <label class="form-label">Date d'arrivée</label>
                                    <input type="date" class="form-control shadow-none mb-3" name="date_arrivee" id="date_arrivee">
                                    
                                    <label class="form-label">Date de départ</label>
                                    <input type="date" class="form-control shadow-none mb-3" name="date_depart" id="date_depart">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="filter" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Filtrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
            <?php if (!empty($message)) : ?>
                    <div class="alert alert-info text-center"><?php echo $message; ?></div>
                <?php endif; ?>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Standard n°1</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Caractéristiques</h6>
                                <?php 
                                    echo "<span class='badge rounded-pill bg-light text-dark text-wrap'>";
                                    echo $caracteristiques[1]['nom'];
                                    echo "</span>";
                                    echo "<span class='badge rounded-pill bg-light text-dark text-wrap'>";
                                    echo $caracteristiques[5]['nom'];
                                    echo "</span>";
                                    echo "<span class='badge rounded-pill bg-light text-dark text-wrap'>";
                                    echo $caracteristiques[6]['nom'];
                                    echo "</span>";
                                    echo "<span class='badge rounded-pill bg-light text-dark text-wrap'>";
                                    echo $caracteristiques[7]['nom'];
                                    echo "</span>";
                                ?>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Services</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Petit déjeuner</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Accès à la piscine</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Climatisation</span>
                            </div>
                            <div class="guests">
                                <h6 class="mb-1">Nombre de personnes</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">2 adultes</span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">1 enfant</span>
                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">85€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve1" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Standard n°2</h5>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve1" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Standard n°3</h5>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve1" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Standard n°4</h5>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve1" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Standard n°5</h5>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve1" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/2.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Standard n°6</h5>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve1" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/1.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Confort n°11</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Caractéristiques</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 lits doubles
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
                            <h6 class="mb-4">100€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve2" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/1.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Confort n°12</h5>
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
                        <h6 class="mb-4">100€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve2" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <h6 class="mb-4">100€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve2" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/1.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Confort n°14</h5>
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
                            <h6 class="mb-4">100€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve2" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="img/rooms/3.png" class="img-fluid rounded" style="height: 250px;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Chambre Premium n°21</h5>
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
                                    Bureau
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
                            <h6 class="mb-4">120€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve3" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <h6 class="mb-4">120€ / nuit</h6>
                            <form method="POST">
                                <input type="hidden" name="date_arrivee" value="<?php echo htmlspecialchars($date_arrivee); ?>">
                                <input type="hidden" name="date_depart" value="<?php echo htmlspecialchars($date_depart); ?>">
                                <button type="submit" name="reserve3" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateDates() {
            const dateArrivee = document.getElementById('date_arrivee').value;
            const dateDepart = document.getElementById('date_depart').value;

            if (!dateArrivee || !dateDepart) {
                alert('Veuillez remplir les dates d\'arrivée et de départ.');
                return false;
            }

            // Passer les valeurs des champs visibles aux champs cachés
            document.getElementById('hidden_date_arrivee').value = dateArrivee;
            document.getElementById('hidden_date_depart').value = dateDepart;

            return true;
        }
    </script>
    <?php require 'liens/footer.php'; ?>

    <script>
    // Initialiser la date minimale sur les deux champs
    const today = new Date().toISOString().split('T')[0]; // Récupérer la date actuelle au format 'yyyy-mm-dd'
    const dateArrivee = document.getElementById('date_arrivee');
    const dateDepart = document.getElementById('date_depart');

    dateArrivee.setAttribute('min', today); // Date minimale pour l'arrivée
    dateDepart.setAttribute('min', today); // Date minimale pour le départ

    // Mettre à jour la date minimale de départ en fonction de la date d'arrivée
    dateArrivee.addEventListener('change', function () {
        const selectedArrivee = dateArrivee.value; // Récupérer la date sélectionnée
        if (selectedArrivee) {
            dateDepart.setAttribute('min', selectedArrivee); // Mettre à jour la date minimale
        }
    });
</script>
</body>
</html>
