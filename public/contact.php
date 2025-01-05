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
                        <i class="bi bi-geo-alt-fill"></i> 239 Rue de l'Étang de l'Or <br>
                        Carnon plage<br>
                        34130 Mauguio<br>
                        France
                    </a>
                    <h5 class="mt-4">Nous appeler</h5>
                    <a href="tel:+33467508800" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>
                        +33 4 67 50 88 00
                    </a>
                    <h5 class="mt-4">Adresse email</h5>
                    <a href="mailto:contact@hotelneptune.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i>
                        contact@hotelneptune.com
                    </a>
                    <h5 class="mt-4">Nous suivre</h5>
                    <a href="https://www.facebook.com/hotelneptunecarnon" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-facebook fs-4 me-1 text-primary"></i></a>
                    <a href="https://www.instagram.com/hotelneptunecarnon" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-instagram fs-4 me-1 text-danger"></i></a>
                    <a href="https://twitter.com/hotelneptunecarnon" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-twitter fs-4 me-1 text-primary"></i></a>
                    <a href="https://www.linkedin.com/company/hotelneptunecarnon" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-linkedin fs-4 me-1 text-primary"></i>
                    </a>
                    <a href="https://www.pinterest.fr/hotelneptunecarnon" class="d-inline-block mb-3 text-decoration-none">
                        <i class="bi bi-pinterest fs-4 me-1 text-danger"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form>
                        <h5>Nous envoyer un message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Nom</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Prénom</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Objet</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php require 'liens/footer.php'; ?>
</body>
</html>
