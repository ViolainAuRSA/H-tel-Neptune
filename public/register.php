<?php
    require_once 'include.php';

    if(isset($_SESSION['id'])){
        header("Location: /");
        exit();
    }

    if(!empty($_POST)){
        extract($_POST);

        $valid = (boolean) true;

        if(isset($_POST['register'])){
            $nom = trim($nom);
            $mail = trim($mail);
            $confmail = trim($confmail);
            $telephone = trim($telephone);
            $password = trim($password);
            $confpassword = trim($confpassword);
        }

            if(empty($nom)){
                $valid = false;
                $err_nom = "Le nom est obligatoire";
            }elseif(grapheme_strlen($nom) < 3){
                $valid = false;
                $err_nom = "Le nom doit contenir plus de 3 caractères";
            }elseif(grapheme_strlen($nom) >= 25){
                $valid = false;
                $err_nom = "Le nom doit contenir moins de 25 caractères";
            }else{
                $req = $DB->prepare("SELECT id FROM users WHERE nom = ?");
                $req->execute(array($nom));
                $req = $req->fetch();
                if(isset($req['id'])){
                    $valid = false;
                    $err_nom = "Le nom est déjà utilisé";
                }
            }

            
            if(empty($mail)){
                $valid = false;
                $err_mail = "L'email est obligatoire";

            }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $valid = false;
                $err_mail = "L'email n'est pas valide";

            }elseif($mail != $confmail){
                $valid = false;
                $err_confmail = "Les emails ne correspondent pas";

            }else{
                $req = $DB->prepare("SELECT id FROM users WHERE email = ?");
                $req->execute(array($mail));
                $req = $req->fetchAll();
                if(isset($req['id'])){
                    $valid = false;
                    $err_name = "Le nom est déjà utilisé";
                }
            }
            if(empty($password)){
                $valid = false;
                $err_password = "Le mot de passe est obligatoire";
            }elseif($password != $confpassword){
                $valid = false;
                $err_confpassword = "Les mots de passe ne correspondent pas";
            }
            if($valid){

                $crypt_password = password_hash($password, PASSWORD_ARGON2ID);

                if(!password_verify($password, $crypt_password)){
                    echo "Le mot de passe est invalide";
                }

                $date_creation = date("Y-m-d H:i:s");
                $date_connexion = date("Y-m-d H:i:s");

                $req = $DB->prepare("INSERT INTO users(nom, email, telephone, mot_de_passe, date_creation, date_connexion) VALUES (?, ?, ?, ?, ?, ?)");
                $req->execute(array($nom, $mail, $telephone, $crypt_password, $date_creation, $date_connexion));

                
                header("Location: login.php");
                exit();
            }
        }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | Hôtel Neptune</title>
    <?php require 'liens/liens.php'; ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header -->
    <?php require_once 'liens/header.php'; ?>

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Inscription</h4>
            <div class="p-4">
                <div class="mb-3">
                    <label for="nom">Nom complet</label><br>
                    <input type="text" id="name" name="nom" placeholder="Nom complet" value="<?php if(isset($nom)) echo $nom; ?>">
                    <?php if(isset($err_nom)) echo $err_nom; ?>
                </div>
                <div class="mb-3">
                    <label for="mail">Email</label><br>
                    <input type="email" id="mail" name="mail" placeholder="mail@exemple.com" value="<?php if(isset($mail)) echo $mail; ?>">
                    <?php if(isset($err_mail)) echo $err_mail; ?>
                </div>
                <div class="mb-3">
                    <label for="confmail">Confirmation de l'email</label><br>
                    <input type="email" id="confmail" name="confmail" placeholder="mail@exemple.com" value="<?php if(isset($confmail)) echo $confmail; ?>">
                    <?php if(isset($err_confmail)) echo $err_confmail; ?>
                </div>
                <div class="mb-3">
                    <label for="telephone">Téléphone</label><br>
                    <input type="tel" id="telephone" name="telephone" placeholder="06 06 06 06 06" value="<?php if(isset($telephone)) echo $telephone; ?>">
                </div>
                <div class="mb-3">
                    <label for="password">Mot de passe</label><br>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" value="<?php if(isset($password)) echo $password; ?>">
                    <?php if(isset($err_password)) echo $err_password; ?>
                </div>
                <div class="mb-4">
                    <label for="confpassword">Confirmation du mot de passe</label><br>
                    <input type="password" id="confpassword" name="confpassword" placeholder="Mot de passe">
                    <?php if(isset($err_confpassword)) echo $err_confpassword; ?>
                </div>
                <button name="register" type="submit" class="btn text-white custom-bg shadow-none">S'inscrire</button>
            </div>
            <div class="register-link">
                <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
            </div>
        </form>
    </div>
</body>
</html>
