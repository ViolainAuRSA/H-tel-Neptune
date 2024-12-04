<?php
// Vérification que le formulaire a bien été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);  // Note : vous devriez sécuriser ce mot de passe (voir étape suivante)

    // Vous pouvez ici ajouter du code pour enregistrer ces informations dans une base de données.

    // Par exemple : 
    // Connexion à la base de données et insertion des données

    // Puis rediriger l'utilisateur vers la page index.php
    header("Location: /index.php");
    exit; // N'oubliez pas d'utiliser exit() après une redirection.
}
?>
