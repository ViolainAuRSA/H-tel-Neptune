<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <img src="/img/circular_logo.png" alt="Logo" class="logo" style="max-height: 100px; max-width: 100px; margin-right: 10px;">    
            <a class="navbar-brand me-2 fw-bold fs-3 h-font" href="/">Hôtel Neptune</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="rooms.php">Nos Chambres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="installations.php">Nos Installations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="about.php">A propos de nous</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mon profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profil.php">Mon Profil</a></li>
                            <li><a class="dropdown-item" href="mes_resa.php">Mes réservations</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                        Connexion
                    </a>
                    <a href="register.php" class="btn btn-outline-dark shadow-none me-lg-9 me-2">
                        Inscription
                    </a>

                </div>
            </div>
        </div>
</nav>
    <!-- Modal Connexion -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form> 
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>Connexion
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control shadow-none" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control shadow-none" name="mot_de_passe" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" name="login" class="btn btn-dark shadow-none">Connexion</button>
                        <a href="javascript:void(0)" class="text-secondary text-decoration-none">Mot de passe oublié ?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
