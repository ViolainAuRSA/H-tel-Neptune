<?php
// Connexion à la base de données
$host = "localhost";
$user = "root"; // Nom d'utilisateur MySQL
$password = "password"; // Mot de passe MySQL
$dbname = "hotel_neptune";

$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room = $_POST['room'];

// Préparation de la requête SQL
$sql = "INSERT INTO reservations (name, email, checkin, checkout, room_type) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $room);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Réservation réussie ! Merci, $name.";
} else {
    echo "Erreur lors de la réservation : " . $conn->error;
}

// Fermeture de la connexion
$stmt->close();
$conn->close();
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
        <nav>
            <a href="index.html">Accueil</a>
            <a href="reservation.html">Réservation</a>
            <a href="contact.html">Contact</a>
        </nav>
    </header>
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
