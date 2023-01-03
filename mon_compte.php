<?php include('objets/inscriptionobjet.php') ?>
<?php include('Include/db.php'); ?>
<?php include('admin/connection.php') ?>
<?php include('Include/connectedlocker.php'); ?>

<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="factureview.js" defer></script>
    <title>Document</title>
</head>
<body>
    <div id="factureCheck">
        <?php 
            $stateuser = $bdd->prepare(
                "SELECT COUNT(*) FROM `admis` WHERE utilisateur = '$utilisateur->identifiant'"            // On est en mesure de récupérer l'identifiant grâce à l'include de la classe.
                );
                $stateuser->execute();
                $resultstateuser = $stateuser->fetchAll();
                $resultstateuserfinish = $resultstateuser[0][0];
                if ($resultstateuserfinish > 0) {
                    echo "vo";
                } else {
                    echo "vn";
                }
        ?>
    </div>
    
    <video src="CSS/video/video_fond.mp4" autoplay loop muted></video>
    <!------------- BArre de navigation verticale --------->
    <div class="master">
        <nav class="navbar col-1 d-xl-block d-s-none d-xs-none bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                <img src="CSS/image/logo.png">
                    <li class="nav-item">
                        <a class="nav-link" href="mon_compte.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="api/inscriptionconcours.php">Candidature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facture.php" id="facturing">Facture</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="admin/admin.php" style="display : <?php if ($utilisateur->admin == "true") {echo "block";} else {echo "none";}?>">Admin</a>
                    </li>
                </ul>
                
                        
                    
            </div>
        </nav>
    <!------------- Container pour englober l'autre partie  --------->
        <div class="container-nav col-10 mt-2">
            
            <div class="nav-welcome">
            <p>Bonjour
            <?php echo $utilisateur->identifiant ?></p>
            
                <input type="search" placeholder="Search">
                <button class="deco mt-4" onclick="window.location.href = 'deco.php';"><img src="CSS/image/logout.png"></button>
            </div>

            
            
            <!----- Informations personnelles ------>
            
            <div class="profilcontainer row d-flex align-items-center justify-content-center">
                        <a class="nav-link" href="profilPicture/index.php"><div class="imgpic" style="background: url(<?php echo substr($utilisateur->profilpic, 3) ?>) no-repeat center; height:15vh; width:15vh; background-size:cover">
                        </div></a> 
            </div>

            <h3 class="mt-5">Mes informations personnelles</h3>
            <div class="container-infos-perso row mt-3">

            

                <div class="content col-sm-2">
                    <h4>Nom :</h4>
                    <p><?php echo $utilisateur->nom ?></p>
                </div>
                <div class="content col-sm-2">
                    <h4>Prénom :</h4>
                    <p><?php echo $utilisateur->prenom ?></p>
                </div>
                <div class="content col-sm-2">
                    <h4>Date de naissance :</h4>
                    <p><?php echo $utilisateur->birth ?></p>
                </div>
                <div class="content col-sm-2">
                    <h4>Adresse :</h4>
                    <p><?php echo $utilisateur ->adresse ?></p>
                </div>
                <div class="content col-sm-2">
                    <h4>Code Postal :</h4>
                    <p><?php echo $utilisateur -> codepostal ?></p>
                </div>
                <div class="content col-sm-2">
                    <h4>Ville :</h4>
                    <p><?php echo $utilisateur->ville ?></p>
                </div>
            </div>
            <!------- Moyen de contact -------->
            <h3 class="mt-5"> Modifications</h3>
            <div class="container-modifs-perso row mt-3">
                <div class="content col-sm-5">
                    <h4>Adresse e-mail :</h4>
                    <p><?php echo $utilisateur ->email ?></p>
                    <button onclick="window.location.href = 'update/email.php';">Modifier</button>
                </div>
                <div class="content col-sm-5">
                    <h4>Mot de passe :</h4>
                    <p>************</p>
                    
                    <button onclick="window.location.href = 'update/mdp.php';">Modifier</button>
                </div>
            </div>
            <!-------- Se déconnecter -------->
            <div class="disconnect d-flex justify-content-center">
                <button class="col-2"><a href="reglement.html"><strong>Reglement</strong></a></button>
            </div>
            
            
            
    </div>
    
    <footer class="mt-5">
        <nav class="navbar-mobile w-100 bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <h2>Singer</h2>
                    <li class="nav-item">
                        <a class="nav-link" href="mon_compte.php"><img src="CSS/image/user.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="api/inscriptionconcours.php"><img src="CSS/image/file.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facture.php"><img src="CSS/image/facture.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deco.php"><img src="CSS/image/logout.png"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </footer>
</body>
</html>

