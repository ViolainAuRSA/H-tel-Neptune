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
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

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
                    <a href="rooms/room1.php" class="cta-button1" style="text-decoration: none; color: white;">Réserver</a>
                </div>
            </div>
            <div class="room-card">
                <img src="img/chambre_superieure.png" alt="Chambre Supérieure">
                <div class="room-info">
                    <h3>Chambre Supérieure</h3>
                    <p>À partir de 180€/nuit</p>
                    <a href="rooms/room2.php" class="cta-button1" style="text-decoration: none; color: white;">Réserver</a>
                </div>
            </div>
            <div class="room-card">
                <img src="img/suite.jpg" alt="Suite">
                <div class="room-info">
                    <h3>Suite</h3>
                    <p>À partir de 250€/nuit</p>
                    <a href="rooms/room3.php" class="cta-button1" style="text-decoration: none; color: white;">Réserver</a>
                </div>
            </div>
        </section>

        <section class="calendar-section">
            <h2>Calendrier de Réservation</h2>
            <div id="calendar"></div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    dayCellDidMount: function (info) {
      // Ajoute une couleur alternée en fonction de l'index du jour
      const dayIndex = info.date.getDate(); // Numéro du jour
      if (dayIndex % 2 === 0) {
        info.el.style.backgroundColor = '#f2f2f2'; // Gris clair
      } else {
        info.el.style.backgroundColor = '#ffffff'; // Blanc
      }
    },
  });

  calendar.render();
});

</script>

        </section>
    </main>

    <?php include 'footer/footer.php'; ?>


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

