<?php
include_once 'include.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Hôtel Neptune</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'header/header.php'; ?>

    <main class="reservation-page">
        <section class="rooms-intro">
            <h1>Nos Chambres</h1>
            <p>Choisissez la chambre qui vous convient et réservez dès maintenant.</p>
        </section>

        <section class="rooms-section">
            <div class="room-card">
                <img src="img/chambre_standard.png" alt="Chambre Standard">
                <div class="room-info">
                    <h3>Chambre Standard</h3>
                    <p>À partir de 120€/nuit</p>
                    <button class="cta-button2">Réserver</button>
                </div>
            </div>
            <div class="room-card">
                <img src="img/chambre_superieure.png" alt="Chambre Supérieure">
                <div class="room-info">
                    <h3>Chambre Supérieure</h3>
                    <p>À partir de 180€/nuit</p>
                    <button class="cta-button2">Réserver</button>
                </div>
            </div>
            <div class="room-card">
                <img src="img/suite.jpg" alt="Suite">
                <div class="room-info">
                    <h3>Suite</h3>
                    <p>À partir de 250€/nuit</p>
                    <button class="cta-button2">Réserver</button>
                </div>
            </div>
        </section>

        <section class="calendar-section">
            <h2>Calendrier de Réservation</h2>
            <div id="calendar"></div>
        </section>
    </main>

    <?php include 'footer/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr'
            });
            calendar.render();
        });
    </script>
</body>
</html>

