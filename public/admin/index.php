<?php

require_once 'include.php';

session_regenerate_id(true);

if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)){
    header('Location: dashboard.php');
}
if(!empty($_POST)){
    extract($_POST);
    $valid = (boolean) true;

    if(isset($_POST['login'])){
        $admin_name = trim($admin_name);
        $admin_pass = trim($admin_pass);

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

            if(isset($result['admin_name'])){
                $_SESSION['adminLogin'] = true;
                header ('Location: dashboard.php');
                exit();
            }
            else{
                $err_admin = "Les informations saisies sont incorrectes";
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
                    <?php if(isset($err_admin)) echo "<span class='text-danger'>$err_admin</span>"; ?>
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Nom de l'administrateur" value="<?php if(isset($admin_name)) echo $admin_name; ?>">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Mot de passe" value="<?php if(isset($admin_pass)) echo $admin_pass; ?>">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Connexion</button>
            </div>
        </form>
    </div>

<?php require 'liens/scripts.php'; ?>
</body>
</html>