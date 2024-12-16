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
            $prenom = trim($prenom);
            $mail = trim($mail);
            $confmail = trim($confmail);
            $password = trim($password);
            $confpassword = trim($confpassword);}

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
                $req = $DB->prepare("SELECT id FROM users WHERE lastname = ?");

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

                $req = $DB->prepare("INSERT INTO users(lastname, firstname, email, password, date_creation, date_connexion) VALUES (?, ?, ?, ?, ?, ?)");
                $req->execute(array($nom, $prenom, $mail, $crypt_password, $date_creation, $date_connexion));

                
                header("Location: login.php");
                exit();
            }
        }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription | Sablier Tranquille</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
    <?php require_once 'header/header.php'; ?>
    </header>

    <main class="main-content">
        <div class="login-container">
            <h1>Inscription</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php if(isset($nom)) echo $nom; ?>">
                    <?php if(isset($err_nom)) echo $err_nom; ?>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?php if(isset($prenom)) echo $prenom; ?>">
                    <?php if(isset($err_prenom)) echo $err_prenom; ?>
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" id="mail" name="mail" placeholder="mail@exemple.com" value="<?php if(isset($mail)) echo $mail; ?>">
                    <?php if(isset($err_mail)) echo $err_mail; ?>
                </div>
                <div class="form-group">
                    <label for="confmail">Confirmation de l'email</label>
                    <input type="email" id="confmail" name="confmail" placeholder="mail@exemple.com" value="<?php if(isset($confmail)) echo $confmail; ?>">
                    <?php if(isset($err_confmail)) echo $err_confmail; ?>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" value="<?php if(isset($password)) echo $password; ?>">
                    <?php if(isset($err_password)) echo $err_password; ?>
                </div>
                <div class="form-group">
                    <label for="confpassword">Confirmation du mot de passe</label>
                    <input type="password" id="confpassword" name="confpassword" placeholder="Mot de passe">
                    <?php if(isset($err_confpassword)) echo $err_confpassword; ?>
                </div>
                <button type="submit" class="submit-btn" name="register">S'inscrire</button>
            </form>
            <div class="register-link">
                <p>Déjà un compte ? <a href="login.php">Se connecter</a></p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once 'footer/footer.php'; ?>
</body>
</html> 