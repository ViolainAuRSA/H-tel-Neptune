<?php

$user = 'app';
$password = 'app_password';
$host = 'database';
$dbname = 'app';
$dsn = "mysql:dbname=$dbname;host=$host";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (\Throwable $th) {
    die('Erreur de connexion à la base de données : ' .$th->getMessage());
}