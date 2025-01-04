<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'liens/liens.php'; ?>
    <title>Hotel Neptune - Accueil</title>
</head>
<body class="bg-light">

    <?php require 'liens/header.php'; ?>

    <!-- Carousel Swiper -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="img/carousel/1.png" alt="Image 1">
                </div>
                <div class="swiper-slide">
                    <img src="img/carousel/2.png" alt="Image 2">
                </div>
                <div class="swiper-slide">
                    <img src="img/carousel/3.png" alt="Image 3">
                </div>
                <div class="swiper-slide">
                    <img src="img/carousel/4.png" alt="Image 4">
                </div>
                <div class="swiper-slide">
                    <img src="img/carousel/5.png" alt="Image 5">
                </div>
                <div class="swiper-slide">
                    <img src="img/carousel/6.png" alt="Image 6">
                </div>
            </div>
        </div>
    </div>

    <!-- Check availability form -->
     <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Vérifier la disponibilité</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Arrivée</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Départ</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Nombre d'adultes</label>
                            <select class="form-select shadow-none">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Nombre d'enfants</label>
                            <select class="form-select shadow-none">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn custom-bg text-white shadow-none">Vérifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>

    <!-- Nos Chambres -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nos Chambres</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="img/rooms/2.png" class="card-img-top" style="height: 250px;">
                    <div class="card-body">
                        <h5>Chambre Standard</h5>
                        <h6 class="mb-4">85€ / nuit</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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
                        <div class="rating mb-4">
                            <h6 class="mb-1">Note</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm custom-bg text-white shadow-none">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Plus d'informations</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="img/rooms/1.png" class="card-img-top" style="height: 250px;">
                    <div class="card-body">
                        <h5>Chambre Confort</h5>
                        <h6 class="mb-4">100€ / nuit</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Caractéristiques</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 lits simples ou doubles
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                30 m² 
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Salle de bain
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Douche à l'italienne
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Bureaux
                            </span>
                        </div>
                        <div class="facilities mb-4">
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
                        <div class="rating mb-4">
                            <h6 class="mb-1">Note</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm custom-bg text-white shadow-none">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Plus d'informations</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="img/rooms/3.png" class="card-img-top" style="height: 250px;">
                    <div class="card-body">
                        <h5>Chambre Premium</h5>
                        <h6 class="mb-4">120€ / nuit</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Caractéristiques</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 lits simples ou doubles
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                40 m² 
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Balcon
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Salle de bain
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Douche à l'italienne ou baignoire
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Bureaux
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Sofa
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Table de travail
                            </span>
                        </div>
                        <div class="facilities mb-4">
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
                        <div class="rating mb-4">
                            <h6 class="mb-1">Note</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm custom-bg text-white shadow-none">Réserver maintenant</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Plus d'informations</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Voir toutes nos chambres >>> </a>
            </div>
        </div>
    </div>

    <!-- Nos services -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nos Services</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/features/wifi.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/features/star.svg" width="80px">
                <h5 class="mt-3">Etoiles</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/features/wifi.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/features/wifi.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="img/features/wifi.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Voir tous nos services</a>
            </div>
        </div>
    </div>

    <!-- Les avis des client     -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Les avis des clients</h2>
    <div class="container">
        <div class="swiper swiper-avis">
            <div class="swiper-wrapper">

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <i class="bi bi-star-fill" style="font-size: 30px;"></i>
                        <h6 class="m-0 ms-2">Random user 1</h6>
                    </div>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat itaque omnis nobis velit possimus suscipit, porro aperiam hic odio consequatur.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <i class="bi bi-star-fill" style="font-size: 30px;"></i>
                        <h6 class="m-0 ms-2">Random user 2</h6>
                    </div>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat itaque omnis nobis velit possimus suscipit, porro aperiam hic odio consequatur.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <i class="bi bi-star-fill" style="font-size: 30px;"></i>
                        <h6 class="m-0 ms-2">Random user 3</h6>
                    </div>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat itaque omnis nobis velit possimus suscipit, porro aperiam hic odio consequatur.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Voir tous nos avis</a>
            </div>
        </div>
    </div>


    <!-- Contact -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contactez-nous</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.5217036631702!2d3.971262576102251!3d43.54581625936959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6bb3f6f499f5b%3A0xa4273d08bd579ecb!2sInter-Hotel%20Neptune!5e1!3m2!1sen!2sfr!4v1736014212331!5m2!1sen!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Nous appeler</h5>
                    <a href="tel:+33467508800" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>
                        +33 4 67 50 88 00
                    </a>
                </div>

                <div class="bg-white p-4 rounded mb-4">
                    <h5>Nous suivre</h5>
                    <a href="https://www.facebook.com/hotelneptunecarnon" class="d-inline-block mb-3 text-decoration-none">
                    <span class="badge bg-light fs-6 p-2 text-dark">    
                    <i class="bi bi-facebook fs-4 me-1 text-primary"></i>
                        Facebook
                    </span>
                    </a>
                    <br>
                    <a href="https://www.instagram.com/hotelneptunecarnon/" class="d-inline-block mb-3 text-decoration-none">
                    <span class="badge bg-light fs-6 p-2 text-dark">    
                    <i class="bi bi-instagram fs-4 me-1 text-danger"></i>
                        Instagram
                    </span>
                    </a>
                    <br>
                    <a href="https://fr.pinterest.com/hotelneptune/_created/" class="d-inline-block mb-3 text-decoration-none">
                    <span class="badge bg-light fs-6 p-2 text-dark">    
                    <i class="bi bi-pinterest fs-4 me-1 text-danger"></i>
                        Pinterest
                    </span>
                    </a>
                    <br>
                    <a href="https://x.com/hotelneptune" class="d-inline-block mb-3 text-decoration-none">
                    <span class="badge bg-light fs-6 p-2 text-dark">    
                    <i class="bi bi-twitter fs-4 me-1 text-primary"></i>
                        Twitter / X
                    </span>
                    </a>
                    <br>
                    <a href="https://www.linkedin.com/company/hôtelneptune/?originalSubdomain=fr" class="d-inline-block mb-3 text-decoration-none">
                    <span class="badge bg-light fs-6 p-2 text-dark">    
                    <i class="bi bi-linkedin fs-4 me-1 text-primary"></i>
                        LinkedIn
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require 'liens/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".swiper-avis", {
            rewind: true,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            });
    </script>
</body>
</html>
