<?php
include_once 'include.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Hôtel Neptune</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'header/header.php'; ?>

    <main class="restaurant-page">
        <section class="restaurant-intro">
            <h1>Notre Restaurant</h1>
            <p>Découvrez une cuisine raffinée dans un cadre exceptionnel.</p>
            <img src="img/restaurant.png" alt="Restaurant" class="restaurant-main-image">
        </section>

        <section class="menu-section">
            <h2>Nos Menus</h2>
            <div class="menu-grid">
                <div class="menu-item">
                    <h3>Menu Gourmet</h3>
                    <img src="img/menu_1.jpg" alt="Menu 1">
                    <p>Entrée, plat, dessert - 45€</p>
                </div>
                <div class="menu-item">
                    <h3>Menu Dégustation</h3>
                    <img src="img/menu2.jpg" alt="Menu 2">
                    <p>5 plats - 70€</p>
                </div>
                <div class="menu-item">
                    <h3>Menu Végétarien</h3>
                    <img src="img/menu3.jpg" alt="Menu 3">
                    <p>Entrée, plat, dessert - 40€</p>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <h2>Galerie</h2>
            <div class="gallery-grid">
                <img src="img/dish1.jpg" alt="Dish 1">
                <img src="img/dish2.jpg" alt="Dish 2">
                <img src="img/dish3.jpg" alt="Dish 3">
                <img src="img/dish4.jpg" alt="Dish 4">
            </div>
        </section>
    </main>

    <?php include 'footer/footer.php'; ?>
</body>
</html>

