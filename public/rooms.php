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
                        <h4 class="mt-2">Filtres</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Vérifier les disponibilités</h5>
                                <label class="form-label">Date d'arrivée</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Date de départ</label>
                                <input type="date" class="form-control shadow-none mb-3">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Options</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Télévision</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Service de chambre</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Balcon</label>
                                </div>
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Nombre de personnes</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Nombre d'adultes</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                    <div>
                                        <label class="form-label">Nombre d'enfants</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
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
                            <h6 class="mb-4">85€ / nuit</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Plus d'informations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'liens/footer.php'; ?>
</body>
</html>
