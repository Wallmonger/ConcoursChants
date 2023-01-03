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
    <script src="app.js" defer></script>
    <title>Document</title>
</head>
<body style="overflow: hidden">
<video src="../CSS/video/video_fond.mp4" autoplay loop muted></video>
    <div class="arnaque d-flex justify-content-center align-items-center">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
    


    <!-- besoin de multiplier banner of admin pour faire une fonction
    click lors du submit du son, pour ensuite l'eteindre via le serverbool grace 
    aux 1o etc  -->
    
        <div class="bannerofadmin text-light" id="adminload">En attente de validation</div>
        <div class="bannerofadminover text-light" id="inscriptionover">Vous avez terminé votre inscription, rendez-vous le 5 novembre à 10h pour ramener la coupe à la maison !!!</div>
        
        
        
   
    <!------------- BArre de navigation verticale --------->
    <div class="container-fluid">
        <div class="row">
        <nav class="navbar col-1 d-xl-block d-s-none d-xs-none bg-grey d-flex">
            <div class="container-fluid">
                <ul class="navbar-nav">
                <img src="../CSS/image/logo.png" class="img-fluid">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../mon_compte.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="inscriptionconcours.php">Candidature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../facture.php"  id="facturing">Facture</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="../admin/admin.php" style="display : <?php if ($utilisateur->admin == "true") {echo "block";} else {echo "none";}?>">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    <!------------- Container pour englober l'autre partie  --------->



                                <div class="container col-8" id="lecontainer">

                                        <div class="nav-welcome" style="visibility: hidden">
                                            <p>Bonjour
                                            <?php echo $utilisateur->identifiant ?></p> 
                                            <button class="deco mt-4" onclick="window.location.href = '../deco.php';"><img src="../CSS/image/logout.png"></button>
                                        </div>

                                        <div class="nav-welcome">
    
                                            <p><?php echo $_SESSION['songmissing']; echo $_SESSION['alreadysubmittedtitle']; echo $_SESSION['sondejapris'];
                                                    unset($_SESSION['songmissing']); unset($_SESSION['alreadysubmittedtitle']); unset($_SESSION['sondejapris'])?></p>
                                        </div>
    
                                        <div class="nav-welcome displayhideconfirmation text-white">
                                            Chèque validé
                                        </div>
                                        <div id="link_wrapper2" class="nav-welcome" style="display : block; visibility: hidden"></div>
                                            <!-- debut de la div inscription -->
                                            <!-- ####################################
                                            #################################### -->
                                            <div class="container-fluid relativebox w-75">
                                                    
                                                    <div class="displayapi mx-2 absolutely z-index-0 w-100">
                                                            <div class="container-fluid h-50">
                                                                <h1>Choisissez votre titre</h1>
                                                            </div>
                                                        <form action="inscriptionconcoursprocess.php" method="POST" class="d-flex justify-content-center flex-column align-items-center">
                                                            <input type="text" name="" id="artiste" placeholder="Artiste" class="form-control w-75 mb-2">
                                                            <input type="text" name="" id="titre" placeholder="Titre" class="form-control w-75 mb-2">
                                                            <input type="button" value="Rechercher" id="buttonSearch" class="btn btn-success align-center mb-2">
                                                                <select name="chansonchoisie" id="search" class="btn btn-info">
                                                                    <option value=""></option>
                                                                </select>
                                                            <input type="submit" value="soumettre" class="btn btn-primary">      
                                                        </form>
                                                    </div>

                                                    <!----- en dessous on y place nos div pour le contenu ------>


                                                    <div class="displayhideupload hide-the-form mx-2 absolutely z-index-1 w-100 text-white">         
                                                        <?php include("../ImageTacker/index.php") ?>
                                                    </div>

                                                    <div class="displayhidecheque hide-the-form mx-2 absolutely z-index-2 w-100">
                                                        <?php include("../cheque/cheque.php") ?>
                                                    </div>
                                                </div>      
                                        </div>
                                        
                                </div>
                                <div class="container col-2"></div>

                                </div>
    </div>
</body>
</html>

<script>
let linkwrapper = document.getElementById('link_wrapper2');
let displayupload = document.querySelector('.displayhideupload');
let displaycheque = document.querySelector('.displayhidecheque');
let displayconfirmation = document.querySelector('.displayhideconfirmation');
let adminload = document.getElementById('adminload');
let lecontainer = document.getElementById('lecontainer');
let facturing = document.getElementById('facturing');
let finished = document.getElementById('inscriptionover');

    
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();                    // On démarre une requête asyncrone
  xhttp.onreadystatechange = function() { 
    if (this.readyState == 4 && this.status == 200) {   // si readystate = 4 et status = 200, tout est bien reçu
      document.getElementById("link_wrapper2").innerHTML =       
      this.responseText;                           // le responseText est la réponse récupérée lors de la requête, qui donnera 1o 2o 3o 

      // conditions pour afficher ou non les formulaires ######################
      if (linkwrapper.innerHTML.includes('1o')) {                    // Si titre a été accepté
        displayupload.classList.remove("hide-the-form");
        displayupload.classList.add("reveal-the-form");
        
        
      } else {
        displayupload.classList.remove("reveal-the-form");
        displayupload.classList.add("hide-the-form");      
      };

      if (linkwrapper.innerHTML.includes('2o')) {                   // Si audio a été accepté
        displaycheque.classList.remove("hide-the-form");
        displaycheque.classList.add("reveal-the-form");
      } else {
        displaycheque.classList.remove("reveal-the-form");
        displaycheque.classList.add("hide-the-form");
      }

      if (linkwrapper.innerHTML.includes('3o')) {                   // Si cheque a été accepté
        displayconfirmation.classList.remove("hide-the-form");
        displayconfirmation.classList.add("reveal-the-form");
      } else {
        displayconfirmation.classList.remove("reveal-the-form");
        displayconfirmation.classList.add("hide-the-form");
      }
      // #######################################################################
      
      
      // Conditions d'affichage de la barre admin côté titre
      if (linkwrapper.innerHTML.includes('1o') && linkwrapper.innerHTML.includes('4o')) {
        adminload.style.visibility = "hidden";
        secondstep();
      }
      else if (linkwrapper.innerHTML.includes('1n') && linkwrapper.innerHTML.includes('4o')) {
        adminload.style.visibility = "visible";
      }

      else {
        adminload.style.visibility = "hidden";
      }
      
      // fonction qui sera jouée lorsque le titre est validé, elle permet d'afficher la barre d'admin pour les audios
      function secondstep () {
        if (linkwrapper.innerHTML.includes('2o') && linkwrapper.innerHTML.includes('5o')) {
            adminload.style.visibility = "hidden";
            thirdstep();
        }
        else if (linkwrapper.innerHTML.includes('2n') && linkwrapper.innerHTML.includes('5o')) {
            adminload.style.visibility = "visible";
        }
        else {
            adminload.style.visibility = "hidden";
        }
      }

      // fonction qui sera jouée lorsque l'audio est validé, permet d'afficher la barre d'attente des chèques
      function thirdstep() {
        if (linkwrapper.innerHTML.includes('3o') && linkwrapper.innerHTML.includes('6o')) {
            adminload.style.visibility = "hidden";
        }
        else if (linkwrapper.innerHTML.includes('3n') && linkwrapper.innerHTML.includes('6o')) {
            adminload.style.visibility = "visible";
        }
        else {
            adminload.style.visibility = "hidden";
        }
      }
      
      if (linkwrapper.innerHTML.includes('vo')) {
        lecontainer.style.display = "none";
        facturing.style.display = "block";
        finished.style.display = "block";
      } else {
        lecontainer.style.display = "visible";
        facturing.style.display = "none";
        finished.style.display = "none";    
      }
      
    }
  };
  xhttp.open("GET", "../api/serverbool.php", true); // ouvre le server.php à link wrapper
  xhttp.send();                          // envoie vers link_wrapper le server.php (responseText);
}
setInterval(function(){
	loadXMLDoc();                         // appel de la fonction ajax, et vérifie si des données sont changées
	// 1sec  
},1000);                                // toutes les 1 secondes, vérifie si des changements on été effectués.

window.onload = loadXMLDoc;             // lorsque la fenêtre est chargée, appeler la fonction
</script>