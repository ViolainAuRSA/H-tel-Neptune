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
            $mail = trim($mail);
            $password = trim($password);
            
            if(empty($mail)){
                $valid = false;
                $err_mail = "L'email est obligatoire";
            }
            if(empty($password)){
                $valid = false;
                $err_password = "Le mot de passe est obligatoire";
            }   
            
            if($valid){
                $req = $DB->prepare("SELECT mot_de_passe FROM users WHERE email = ?");
                $req->execute(array($mail));
                $req = $req->fetch();
                

                if(isset($req['mot_de_passe'])){
                    if(!password_verify($password, $req['mot_de_passe'])){
                        $valid = false;
                        $err_password = "Le mot de passe est incorrect";
                    }
                }
                else{
                    $valid = false;
                    $err_mail = "L'email est incorrect";
                }

            }
            

            if($valid){

                $req = $DB->prepare("SELECT * FROM users WHERE email = ?");
                $req->execute(array($mail));
                $req_user = $req->fetch();
                

                if(isset($req_user['id'])){
                    $date_connexion = date("Y-m-d H:i:s");

                    $req = $DB->prepare("UPDATE users SET date_connexion = ? WHERE id = ?");
                    $req->execute(array($date_connexion, $req_user['id']));

                    $_SESSION['id'] = $req_user['id'];
                    $_SESSION['nom'] = $req_user['nom'];
                    $_SESSION['email'] = $req_user['email'];
                
                    header("Location: /");
                    exit();
                }
                else{
                    $valid = false;
                    var_dump($req_user);
                    $err_mail = "La combinaison email/mot de passe est incorrecte";
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion | Sablier Tranquille</title>
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
    <?php require 'liens/header.php'; ?>
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Connexion</h4>
            <div class="p-4">
                <div class="mb-3">
                <label for="mail">Email</label>
                    <input type="email" id="mail" name="mail" placeholder="mail@exemple.com" value="<?php if(isset($mail)) echo $mail; ?>">
                    <?php if(isset($err_mail)) echo $err_mail; ?>
                </div>
                <div class="mb-4">
                <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" value="<?php if(isset($password)) echo $password; ?>">
                    <?php if(isset($err_password)) echo $err_password; ?>
                </div>
                <button name="register" type="submit" class="btn text-white custom-bg shadow-none">Connexion</button>
            </div>
            <div class="register-link">
                <p>Pas encore de compte ? <a href="register.php"> S'inscrire</a></p>
            </div>
        </form>
    </div>
</body>
</html> 