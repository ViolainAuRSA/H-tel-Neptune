<?php

    require_once 'include.php';
    require_once 'liens/essentials.php';

    // Vérification si l'utilisateur est connecté et est un administrateur
    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        // Rediriger vers la page de connexion ou une autre page
        header("Location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require 'liens/liens.php'; ?>
</head>
<body class="bg-light">
    

<?php require 'liens/header.php'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">Paramètres</h3>

            <!-- Paramètres généraux -->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Paramètres généraux</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#generalSettings">
                            <i class="bi bi-pencil-square"></i> Modifier
                        </button>
                    </div>
                    <h6 class="card-subtitle mb-1 fw-bold">Nom du site</h6>
                    <p class="card-text" id="site_title"></p>
                    <h6 class="card-subtitle mb-1 fw-bold">A propos de nous</h6>
                    <p class="card-text" id="site_about"></p>
                </div>
            </div>

            <!-- Modal paramètres généraux-->
            <div class="modal fade" id="generalSettings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Paramètres généraux</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nom du site</label>
                                    <input type="text" name="site_title" id="site_title_input" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">A propos</label>
                                    <textarea name="site_about" id="site_about_input" class="form-control shadow-none" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="site_title.value  = general_data.site_title" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn custom-bg text-white shadow-none">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


<?php require 'liens/scripts.php'; ?>
<script>
    let general_data;

    function get_general(){
        let site_title = document.getElementById('site_title');
        let site_about = document.getElementById('site_about');

        let site_title_input = document.getElementById('site_title_input');
        let site_about_input = document.getElementById('site_about_input');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/settings_crud.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
            general_data = JSON.parse(this.responseText);

            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;

            site_title_input.value = general_data.site_title;
            site_about_input.value = general_data.site_about;
        }

        xhr.send('get_general')
    }


    window.onload = function(){
        get_general();
    }

</script>
</body>
</html>
