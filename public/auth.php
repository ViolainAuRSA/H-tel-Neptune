<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Ici, vous devrez implémenter la vérification avec votre base de données
    // Ceci est un exemple simplifié
    if ($email === 'admin@hotel.fr' && $password === 'admin123') {
        $_SESSION['user'] = [
            'email' => $email,
            'role' => 'admin'
        ];
        echo json_encode(['success' => true]);
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Identifiants incorrects']);
    }
}
?>
