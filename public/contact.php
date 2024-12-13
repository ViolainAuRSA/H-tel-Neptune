<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
    // Ici, vous pouvez ajouter le code pour envoyer l'email
    // Par exemple avec mail() ou PHPMailer
    
    $success = true;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Hôtel Le Luxe</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'header/header.php'; ?>

    <main>
        <section class="contact-page">
            <h1>Contactez-nous</h1>
            
            <?php if (isset($success)): ?>
                <div class="alert success">
                    Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.
                </div>
            <?php endif; ?>

            <div class="contact-grid">
                <form class="contact-form" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom complet</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <select id="sujet" name="sujet" required>
                            <option value="">Choisissez un sujet</option>
                            <option value="reservation">Réservation</option>
                            <option value="information">Demande d'information</option>
                            <option value="reclamation">Réclamation</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="cta-button">Envoyer le message</button>
                </form>
            </div>
        </section>
    </main>

    <?php include 'footer/footer.php'; ?>

</body>
</html> 