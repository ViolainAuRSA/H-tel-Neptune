<?php
// Informations de connexion à la base de données
$user = 'app'; // Remplacez par votre nom d'utilisateur MySQL
$password = 'app_password'; // Remplacez par votre mot de passe MySQL
$host = 'database'; // Remplacez par l'hôte (souvent 'localhost' ou '127.0.0.1')
$dbname = 'app'; // Remplacez par le nom de votre base de données

// Chaîne de connexion (DSN)
$dsn = "mysql:dbname=$dbname;host=$host;charset=utf8mb4"; // Ajout de charset pour éviter les problèmes d'encodage

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    ]);

    // Message de succès (à retirer en production)
    echo "Connexion réussie à la base de données.";
} catch (Throwable $th) {
    // Gestion des erreurs avec un message clair
    die('Erreur de connexion à la base de données : ' . $th->getMessage());
}
