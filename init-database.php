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
';

$pdo->query($sql);