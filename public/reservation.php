<?php
// Connexion à la base de données
$host = "database";
$dbname = "app";
$user = "app"; // Remplacez par vos identifiants
$password = "app_password";
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Throwable $th) {
    die("Erreur de connexion à la base de données : " . $th->getMessage());
}

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['email'], $_POST['checkin'], $_POST['checkout'], $_POST['room'])) {
        // Sécurisation des données
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $checkin = htmlspecialchars($_POST['checkin']);
        $checkout = htmlspecialchars($_POST['checkout']);
        $room = htmlspecialchars($_POST['room']);

        // Validation des dates
        if (strtotime($checkin) > strtotime($checkout)) {
            echo "Erreur : La date d'arrivée ne peut pas être postérieure à la date de départ.";
            exit; // Arrête l'exécution du script en cas d'erreur
        }

        // Requête SQL préparée avec PDO
        $sql = "INSERT INTO reservations (name, email, checkin, checkout, room_type) 
                VALUES (:name, :email, :checkin, :checkout, :room)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':checkin', $checkin);
        $stmt->bindValue(':checkout', $checkout);
        $stmt->bindValue(':room', $room);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Réservation enregistrée avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'enregistrement de la réservation.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
} else {
    echo "Accès non autorisé.";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Hôtel Neptune</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <header>
        <h1>Hôtel Neptune</h1>
                <ul class="nav-menu">
                    <li><a href="index.php" class="active">Accueil</a></li>
                    <li><a href="reservation.php">Réservations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
    </header>

    <?php if (!empty($message)): ?>
        <div class="message <?php echo (strpos($message, 'Erreur') !== false) ? 'error' : 'success'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <main>
        <h2>Réserver une chambre</h2>
        <form id="reservation-form" action="reservation.php" method="POST">
            <label for="name">Nom complet :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" required>

            <label for="checkin">Date d'arrivée :</label>
            <input type="date" id="checkin" name="checkin" required>

            <label for="checkout">Date de départ :</label>
            <input type="date" id="checkout" name="checkout" required>

            <label for="room">Type de chambre :</label>
            <select id="room" name="room" required>
                <option value="single">Simple</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
            </select>

            <button type="submit">Réserver</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Hôtel Neptune. Tous droits réservés.</p>
    </footer>
</body>
</html>
