<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <video src="../profil/video/video_fond.mp4" autoplay loop muted></video>
    <!------------- BArre de navigation verticale --------->
    <div class="master">
        <nav class="navbar col-1 d-xl-block d-s-none d-xs-none bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <h2>Singer</h2>
                    <li class="nav-item">
                        <a class="nav-link" href="profil_dashboard.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="candidature.php">Candidature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ma_facture.php">Facture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mon_compte.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    <!------------- Container pour englober l'autre partie  --------->
        <div class="container-nav col-10 mt-2">
            <div class="nav-welcome">
                <p>Bonjour Brigitte !</p>
                <input type="search" placeholder="Search">
                <button class="deco mt-4"><img src="img/logout.png"></button>
            </div>
            <!----- en dessous on y place nos div pour le contenu ------>
            <div class="content-info mt-5">
                <div class="content">
                    <h3>Inscription</h3>
                    <p>100</p>
                </div>
                <div class="content">
                    <h3>Inscription en attente</h3>
                    <p>80</p>
                </div>
                <div class="content">
                    <h3>Inscription validée</h3>
                    <p>45</p>
                </div>
            </div>
            <div class="tableau mt-5">

            </div>
        </div>
    </div>
    <footer class="mt-5">
        <nav class="navbar-mobile w-100 bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <h2>Singer</h2>
                    <li class="nav-item">
                        <a class="nav-link" href="profil_dashboard.php"><img src="./img/user.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="candidature.php"><img src="img/file.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ma_facture.php"><img src="img/facture.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mon_compte.php"><img src="img/settings.png"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </footer>
</body>
</html>