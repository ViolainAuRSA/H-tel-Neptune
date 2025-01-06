<?php
require_once 'include.php';

$req = $DB->query("SELECT * FROM contact_details");
$contact_details = $req->fetch();

$adresse = $contact_details['adresse'];
$gmap = $contact_details['gmap'];
$telephone = $contact_details['telephone'];
$email = $contact_details['email'];
$facebook = $contact_details['facebook'];
$insta = $contact_details['insta'];
$twitter = $contact_details['twitter'];
$linkedin = $contact_details['linkedin'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'liens/liens.php'; ?>
    <title>Hotel Neptune - Contact</title>
</head>
<body class="bg-light">

    <?php require 'liens/header.php'; ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Nous contacter</h2>
        <div class="h-line bg-dark" style="width: 150px; margin: 0 auto; height: 1.7px;"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.5217036631702!2d3.971262576102251!3d43.54581625936959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6bb3f6f499f5b%3A0xa4273d08bd579ecb!2sInter-Hotel%20Neptune!5e1!3m2!1sen!2sfr!4v1736014212331!5m2!1sen!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Adresse</h5>
                    <a href="https://maps.app.goo.gl/Y1Jp5bZSP6rcvry66" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $adresse; ?>
                    </a>
                    <h5 class="mt-4">Nous appeler</h5>
                    <a href="tel:+33467508800" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>
                        <?php echo $telephone; ?>
                    </a>
                    <h5 class="mt-4">Adresse email</h5>
                    <a href="mailto:contact@hotelneptune.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i>
                        <?php echo $email; ?>
                    </a>
                    <h5 class="mt-4">Nous suivre</h5>
                    <a href="<?php echo $facebook; ?>" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-facebook fs-4 me-1 text-primary"></i></a>
                    <a href="<?php echo $insta; ?>" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-instagram fs-4 me-1 text-danger"></i></a>
                    <a href="<?php echo $twitter; ?>" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-twitter fs-4 me-1 text-primary"></i></a>
                    <a href="<?php echo $linkedin; ?>" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-linkedin fs-4 me-1 text-primary"></i>
                    </a>
                    <a href="<?php echo $pinterest; ?>" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-pinterest fs-4 me-1 text-danger"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Nous envoyer un message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Nom</label>
                            <input type="text" class="form-control shadow-none" name="nom" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none" name="email" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Objet</label>
                            <input type="text" class="form-control shadow-none" name="objet" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3" name="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $objet = $_POST['objet'];
        $message = $_POST['message'];
        $date = date('Y-m-d H:i:s');

        // Préparer la requête avec des paramètres liés
        $req = $DB->prepare("INSERT INTO `demande_user`(`name`, `email`, `sujet`, `message`, `date`, `vu`) VALUES (:name, :email, :sujet, :message, :date, :vu)");
        
        // Lier les paramètres
        $req->bindParam(':name', $nom);
        $req->bindParam(':email', $email);
        $req->bindParam(':sujet', $objet);
        $req->bindParam(':message', $message);
        $req->bindParam(':date', $date);
        $vu = 0; // Par défaut, "vu" est à 0 (non vu)
        $req->bindParam(':vu', $vu);
        
        // Exécuter la requête
        if ($req->execute()) {
            echo "<script>alert('Message envoyé avec succès');</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'envoi du message.');</script>";
        }
    }
    ?>

    <?php require 'liens/footer.php'; ?>
</body>
</html>
