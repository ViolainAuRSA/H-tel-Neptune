<?php

require_once __DIR__ . '/Database.php';

$sql = "CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_chambre INT NOT NULL,
    id_user INT NOT NULL,
    date_arrivee DATE NOT NULL,
    date_depart DATE NOT NULL,
    nb_adultes INT NOT NULL,
    nb_enfants INT NOT NULL,
    prix_total DECIMAL(10,2) NOT NULL,
    status ENUM('en_attente', 'confirmee', 'annulee') DEFAULT 'en_attente',
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_chambre) REFERENCES chambres(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
);";

$DB->exec($sql);

?>