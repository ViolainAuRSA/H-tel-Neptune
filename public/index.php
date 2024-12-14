<?php
include_once 'include.php'
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel Le Luxe - Votre séjour de rêve</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <?php include 'header/header.php'; ?>
    <main>
        <section id="accueil" class="hero">
            <h1>Bienvenue à l'Hôtel Le Luxe</h1>
            <p>Une expérience unique au cœur de la ville</p>
            <br>
            <a href="reservation.php" class="cta-button">Réserver maintenant</a>
        </section>

        <section id="chambres" class="rooms">
            <h2>Nos Chambres</h2>
            <div class="room-grid">
                <div class="room-card">
                    <img src="img/chambre_standard.png" alt="Chambre Standard">
                    <h3>Chambre Standard</h3>
                    <p>À partir de 120€/nuit</p>
                    <a href="#" class="book-btn">Réserver</a>
                </div>
                <div class="room-card">
                    <img src="img/chambre_superieure.png" alt="Chambre Supérieure">
                    <h3>Chambre Supérieure</h3>
                    <p>À partir de 180€/nuit</p>
                    <a href="#" class="book-btn">Réserver</a>
                </div>
                <div class="room-card">
                    <img src="img/suite.jpg" alt="Suite">
                    <h3>Suite</h3>
                    <p>À partir de 250€/nuit</p>
                    <a href="#" class="book-btn">Réserver</a>
                </div>
            </div>
        </section>

        <section id="restaurant" class="restaurant">
            <h2>Notre Restaurant</h2>
            <p>Découvrez une cuisine raffinée dans un cadre exceptionnel</p>
            <img src="img/restau.png" alt="Présentation du restaurant" class="restaurant-presentation">
            <div class="restaurant-info">
                <div class="hours">
                    <h3>Horaires</h3>
                    <p>Déjeuner: 12h00 - 14h30</p>
                    <p>Dîner: 19h00 - 22h30</p>
                </div>
                <a href="#" class="cta-button">Réserver une table</a>
            </div>
        </section>

        <section id="piscine" class="pool">
            <h2>Piscine & Spa</h2>
            <div class="facilities">
                <div class="facility">
                    <i class="fas fa-swimming-pool"></i>
                    <h3>Piscine chauffée</h3>
                    <p>Ouverte de 7h à 22h</p>
                </div>
                <div class="facility">
                    <i class="fas fa-spa"></i>
                    <h3>Spa</h3>
                    <p>Massages et soins sur rendez-vous</p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer/footer.php'; ?>

    <script src="js/main.js"></script>
</body>
</html>
