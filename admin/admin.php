<?php include('../objets/inscriptionobjet.php') ?>
<?php include('../Include/db.php'); ?>
<?php include('../admin/connection.php') ?>
<?php include('../Include/connectedlocker.php'); ?>



<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../admin/triggerplay.js" async></script>   <!-- script avec la notion async pour permettre de lire la fonction sur les objets crées par le serveur -->
    <title>Document</title>
</head>
<body>
    <!------------- BArre de navigation verticale --------->
    <video src="../CSS/video/video_fond.mp4" autoplay loop muted></video>
    <div class="master">
        <nav class="navbar col-1 d-xl-block d-s-none d-xs-none bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                <img src="../CSS/image/logo.png">
                    <li class="nav-item">
                        <a class="nav-link" href="../mon_compte.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../api/inscriptionconcours.php">Candidature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../facture.php">Facture</a>
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
                <button class="deco mt-4" onclick="window.location.href = '../deco.php';"><img src="../CSS/image/logout.png"></button>
            </div>
            <!----- en dessous on y place nos div pour le contenu ------>
            <div class="content-info mt-5">
                <div class="content">
                    <h3>Inscription</h3>
                    <p><?php include("../Include/numberofusers.php") ?></p>
                </div>
                
                <div class="content">
                    <h3>Inscription en attente</h3>
                    <p><?php include("../Include/numberofsubscription.php") ?></p>
                </div>
                <div class="content">
                    <h3>Inscription validée</h3>
                    <p><?php include("../Include/numberofvalidation.php")?></p>
                </div>
            </div>
            
            <div class="container-fluid text-center">
                </div>
                
                <div class="tableau mt-2">
                    <div class="container">
        <audio id="audioPlayer" loop controls>                                                    <!-- l'objet audio dont le src changera grâce au javascript -->
                            <source src="Sound/PlayerSelect.mp3" type="audio/mpeg"> 
        </audio>

		<div id="link_wrapper">         <!-- grace à cet id, on pourra récupérer le contenu de la page server.php, en temps réel -->
        
		</div>
	</div>
            </div>
        </div>
    </div>
    <footer class="mt-5">
        <!-- <nav class="navbar-mobile w-100 bg-grey">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <h2>Singer</h2>
                    <li class="nav-item">
                        <a class="nav-link" href="../profil.php"><img src="./img/user.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../api/inscriptionconcours.php"><img src="img/file.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../facture.php"><img src="img/facture.png"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mon_compte.php"><img src="img/settings.png"></a>
                    </li>
                </ul>
            </div>
        </nav> -->
    </footer>
</body>
</html>

<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();                    // On démarre une requête asyncrone
  xhttp.onreadystatechange = function() { 
    if (this.readyState == 4 && this.status == 200) {   // si readystate = 4 et status = 200, tout est bien reçu
      document.getElementById("link_wrapper").innerHTML =       
      this.responseText;                           // le responseText est la réponse récupérée lors de la requête 
    }
  };
  xhttp.open("GET", "../admin/server.php", true); // ouvre le server.php à link wrapper
  xhttp.send();                          // envoie vers link_wrapper le server.php (responseText);
}
setInterval(function(){
	loadXMLDoc();                         // appel de la fonction ajax, et vérifie si des données sont changées
	// 1sec  
},1000);                                // toutes les 1 secondes, vérifie si des changements on été effectués.

window.onload = loadXMLDoc;             // lorsque la fenêtre est chargée, appeler la fonction
</script>