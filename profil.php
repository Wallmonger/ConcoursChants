<?php include('objets/inscriptionobjet.php');
        include('Include/connectedlocker.php'); ?>

<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/profil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php include("Include/arnaque.php") ?>
    <!------------- BArre de navigation verticale --------->
    <div class="master">
        <nav class="navbar col-1 bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <h2>Singer</h2>
                    <li class="nav-item">
                        <a class="nav-link active-link" href="profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="api/inscriptionconcours.php">Candidature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facture.php">Facture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mon_compte.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/admin.php" style="display : <?php if ($utilisateur->admin == "true") {echo "block";} else {echo "none";}?>">Admin</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    <!------------- Container pour englober l'autre partie  --------->
        <div class="container-nav col-11 mt-2">
            <div class="nav-welcome">
                
                <p>Bonjour <?php echo $utilisateur->identifiant ?></p>
            </div>
            <!----- en dessous on y place nos div pour le contenu ------>
            <div class="nav-welcome profilcontainer">
            <a class="nav-link" href="profilPicture/index.php"><div class="imgpic" style="background: url(<?php echo substr($utilisateur->profilpic, 3) ?>) no-repeat center; height:15vh; width:15vh; background-size:cover">
            </div></a>        

                <p>Nom: <?php echo $utilisateur->nom ?></p>                              <!--Données utilisateur de la classe-->
                <p>Prénom: <?php echo $utilisateur->prenom ?></p>
                <p>Email: <?php echo $utilisateur ->email ?></p>
                <p>Adresse: <?php echo $utilisateur ->adresse ?></p>
                <p>Code Postal: <?php echo $utilisateur -> codepostal ?></p>
                <p>Ville: <?php echo $utilisateur->ville ?></p>
                <p>Date de naissance: <?php echo $utilisateur->birth ?></p>
                
            </div>
            <!-- <div class="nav-welcome">
                <p>Bonjour</p>
            </div> -->
        </div>
    </div>

    
    
</body>
</html>
