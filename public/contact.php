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
            <div class="contact-form">
                <h1>Contactez-nous</h1>
                
                <?php if (isset($success)): ?>
                    <div class="alert success">
                        Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="mail@exemple.com" required>
                    </div>

                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input type="text" id="sujet" name="sujet" placeholder="Sujet" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
                    </div>

                    <button type="submit" class="cta-button">Envoyer</button>
                </form>
            </div>
    </main>

    <?php include 'footer/footer.php'; ?>

</body>
</html> 