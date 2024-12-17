<?php
$prix_par_nuit = 180;
$capacite_max = 4;

// Traitement du calcul du prix si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_arrivee = new DateTime($_POST['date_arrivee']);
    $date_depart = new DateTime($_POST['date_depart']);
    $nb_personnes = $_POST['nb_personnes'];
    
    // Calcul du nombre de nuits
    $interval = $date_arrivee->diff($date_depart);
    $nb_nuits = $interval->days;
    
    // Calcul du prix total
    $prix_total = $prix_par_nuit * $nb_nuits;
    
    // Supplément si plus d'une personne (20€ par personne supplémentaire par nuit)
    if ($nb_personnes > 1) {
        $prix_total += (($nb_personnes - 1) * 20) * $nb_nuits;
    }
}
    session_start();
    include_once '../../Database.php'; 
    if (!isset($_SESSION['id'])){
        header('Location: ../login.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        echo "ok";
    }    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chambre Supérieure</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/circular_logo.png" alt="Logo Hôtel Le Luxe">
            </div>
            <ul class="nav-links">
                <li><a href="/">Accueil</a></li>
                <li><a href="../reservation.php">Nos Chambres</a></li>
                <li><a href="../restaurant.php">Restaurant</a></li>
                <li><a href="#piscine">Piscine & Spa</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <?php if(isset($_SESSION['id'])): ?>
                    <li><a href="../logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="../login.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="room-page">
        <section class="room-details">
            <h1>Chambre Supérieure</h1>
            <img src="../img/chambre_superieure.png" alt="Chambre Supérieure" style="width: 100%; max-width: 600px; height: 300px; object-fit: cover;">
            <p>Prix par nuit : <?php echo $prix_par_nuit; ?>€</p>
            
            <form id="reservation-form" method="POST" class="reservation-form">
                <div class="form-group">
                    <label for="date_arrivee">Date d'arrivée :</label>
                    <input type="date" id="date_arrivee" name="date_arrivee" required 
                           min="<?php echo date('Y-m-d'); ?>" 
                           onchange="updateMinDepartDate()">
                </div>

                <div class="form-group">
                    <label for="date_depart">Date de départ :</label>
                    <input type="date" id="date_depart" name="date_depart" required
                           min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                           onchange="calculatePrice()">
                </div>

                <div class="form-group">
                    <label for="nb_personnes">Nombre de personnes :</label>
                    <select id="nb_personnes" name="nb_personnes" required onchange="calculatePrice()">
                        <option value="1">1 personne</option>
                        <option value="2">2 personnes</option>
                        <option value="3">3 personnes</option>
                        <option value="4">4 personnes</option>
                    </select>
                </div>

                <?php if(isset($prix_total)): ?>
                    <div class="price-summary">
                        <h3>Résumé de votre réservation</h3>
                        <p>Nombre de nuits : <?php echo $nb_nuits; ?></p>
                        <p>Nombre de personnes : <?php echo $nb_personnes; ?></p>
                        <p class="total-price">Prix total : <?php echo $prix_total; ?>€</p>
                    </div>
                <?php endif; ?>

                <button type="submit" class="submit-btn">Confirmer la réservation</button>
            </form>
        </section>
    </main>

    <?php include '../footer/footer.php'; ?>

    <script>
    function updateMinDepartDate() {
        const arrivalDate = new Date(document.getElementById('date_arrivee').value);
        const departureInput = document.getElementById('date_depart');
        
        arrivalDate.setDate(arrivalDate.getDate() + 1);
        const minDepartDate = arrivalDate.toISOString().split('T')[0];
        departureInput.min = minDepartDate;
        
        if (departureInput.value && departureInput.value < minDepartDate) {
            departureInput.value = minDepartDate;
        }
        
        calculatePrice();
    }

    function incrementPersons() {
        const input = document.getElementById('nb_personnes');
        if (input.value < 4) {
            input.value = parseInt(input.value) + 1;
            calculatePrice();
        }
    }

    function decrementPersons() {
        const input = document.getElementById('nb_personnes');
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
            calculatePrice();
        }
    }

    function calculatePrice() {
        const dateArrivee = new Date(document.getElementById('date_arrivee').value);
        const dateDepart = new Date(document.getElementById('date_depart').value);
        const nbPersonnes = parseInt(document.getElementById('nb_personnes').value);
        
        if (dateArrivee && dateDepart && dateDepart > dateArrivee) {
            const nbNuits = Math.ceil((dateDepart - dateArrivee) / (1000 * 60 * 60 * 24));
            let prixTotal = <?php echo $prix_par_nuit; ?> * nbNuits;
            
            if (nbPersonnes > 1) {
                prixTotal += ((nbPersonnes - 1) * 20) * nbNuits;
            }
            
            const priceSummary = document.createElement('div');
            priceSummary.innerHTML = `
                <div class="price-summary">
                    <h3>Résumé de votre réservation</h3>
                    <p>Nombre de nuits : ${nbNuits}</p>
                    <p>Nombre de personnes : ${nbPersonnes}</p>
                    <p class="total-price">Prix total : ${prixTotal}€</p>
                </div>
            `;
            
            const existingSummary = document.querySelector('.price-summary');
            if (existingSummary) {
                existingSummary.replaceWith(priceSummary);
            } else {
                document.getElementById('reservation-form').insertBefore(
                    priceSummary,
                    document.querySelector('.submit-btn')
                );
            }
        }
    }
    </script>
</body>
</html>
