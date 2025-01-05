<?php
    require_once '../include.php';

    if(!empty($_POST['login'])){
        extract($_POST);
        
        $valid = (boolean) true;

        echo "ça passe 0";

        if(isset($_POST['login'])){
            $admin_name = trim($admin_name);
            $admin_pass = trim($admin_pass);

            echo "ça passe 1";

            if(empty($admin_name)){
                $valid = false;
                $err_admin_name = "Le nom de l'administrateur est requis";
            }
            if(empty($admin_pass)){
                $valid = false;
                $err_admin_pass = "Le mot de passe est requis";
            }
            if($valid){
                $req = $DB->prepare("SELECT * FROM Admin_cred WHERE admin_name = ? AND admin_pass = ?");
                $req->execute(array($admin_name, $admin_pass));
                $result = $req->fetch();
                
                if(isset($req['admin_pass'])){
                    if(!password_verify($admin_pass, $req['admin_pass'])){
                        $valid = false;
                        $err_admin_pass = "Le mot de passe est incorrect";
                    }
                }
                else{
                    $valid = false;
                    $err_admin_name = "Le nom de l'administrateur est incorrect";
                }
            }

            echo "ça va pour le moment";

            if($valid){
                $req = $DB->prepare("SELECT * FROM Admin_cred WHERE admin_name = ? AND admin_pass = ?");
                $req->execute(array($admin_name, $admin_pass));
                $result = $req->fetch();

                if(isset($result['admin_name'])){
                    $req = $DB->prepare("SELECT * FROM Admin_cred WHERE admin_name = ? AND admin_pass = ?");
                    $req->execute(array($admin_name, $admin_pass));
                    
                    $_SESSION['sr_no'] = $result['sr_no'];
                    header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="post">
            <h4 class="bg-dark text-white py-3">Panneau d'administration</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Nom de l'administrateur">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Mot de passe">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Connexion</button>
            </div>
        </form>
    </div>

<?php require 'liens/scripts.php'; ?>
</body>
</html>
