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
                $req = $DB->prepare("SELECT password FROM users WHERE email = ?");
                $req->execute(array($mail));
                $req = $req->fetch();
                

                if(isset($req['password'])){
                    if(!password_verify($password, $req['password'])){
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
                    $_SESSION['firstname'] = $req_user['firstname'];
                    $_SESSION['lastname'] = $req_user['lastname'];
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
            <h1>Connexion</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" id="mail" name="mail" placeholder="mail@exemple.com" value="<?php if(isset($mail)) echo $mail; ?>">
                    <?php if(isset($err_mail)) echo $err_mail; ?>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" value="<?php if(isset($password)) echo $password; ?>">
                    <?php if(isset($err_password)) echo $err_password; ?>
                </div>
                <button type="submit" class="submit-btn" name="register">Se connecter</button>
            </form>
            <div class="register-link">
                <p>Pas encore de compte ? <a href="register.php">S'inscrire</a></p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once 'footer/footer.php'; ?>
</body>
</html> 