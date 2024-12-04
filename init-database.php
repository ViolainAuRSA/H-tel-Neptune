<?php

require_once __DIR__ . '/database.php';

$sql = '
    CREATE TABLE IF NOT EXISTS `users`(
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(40) NOT NULL,
    `lastname` VARCHAR(40) NOT NULL,
    `admin` BOOLEAN NOT NULL DEFAULT FALSE
    );

    CREATE TABLE IF NOT EXISTS `Chambres`(
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY);
 
    CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    checkin DATE NOT NULL,
    checkout DATE NOT NULL,
    room_type VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
';

$pdo->query($sql);