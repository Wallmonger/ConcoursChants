<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocumentInscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="CSS/inscription.css" rel="stylesheet">
</head>
<body>

<video autoplay="autoplay" loop muted src="CSS/video/video_fond.mp4"></video>

    <h1 class="text-center mt-5 text-light">Inscription</h1>
    
        <div class="container-fluid d-flex justify-content-center">
            <form action="inscription/inscriptioncode.php" method="POST">

                <!--Input Genre-->
                
                
                        <div class="my-5 d-flex justify-content-center">
                                <input type="radio" class="btn-check" name="genre" id="genreH" value='homme' autocomplete="off" checked>
                                <label class="btn btn-outline-primary w-50 btn btn-lg genreone" for="genreH">Homme</label>
                        
                        
                                <input type="radio" class="btn-check" name="genre" id="genreF" value="femme" autocomplete="off">
                                <label class="btn btn-outline-danger btn w-50 btn-lg genretwo" for="genreF">Femme</label>
                            </div>                               
                    

                        <p><?php                                         // paragraphe des erreurs
                        session_start();
                        if(isset($_SESSION["error"])) {
                            foreach($_SESSION["error"] as $message) {
                        ?>
                                <p><?= $message ?></p>
                        <?php
                        }
                            unset($_SESSION["error"]);
                        }
                        ?>


                        <?php
                        echo $_SESSION['nothingtosend'] . "<br>";
                        unset($_SESSION['nothingtosend']);          // fin du paragraphe des erreurs
                        ?></p>
                

                

                <input type="text" class="form-control form-control-lg mb-2" name="identifiant" id="identifiant" required maxlength="20" minlength="3" placeholder="identifiant" pattern="[A-Za-z0-9]{3,255}">
                <!-- input EMAIL -->
                <input type="email" class="form-control form-control-lg mb-2" name="email" id="email" required placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                <!--Input Mot de passe-->
                <input type="password" class="form-control form-control-lg mb-2" name="password" id="password" required maxlength="255" minlength="6" placeholder="mot de passe">
                <!--Input Confirm mot de passe-->
                <input type="password" class="form-control form-control-lg mb-2" name="confirmPassword" id="confirmPassword" required maxlength="255" minlength="6" placeholder="confirmer le mot de passe">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                                        <!--Input Prénom-->
                                        <input type="text" class="form-control form-control-lg mb-2" name="firstname" required placeholder="Prénom" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ0-9]{3,50}">
                        </div>
                        <div class="col">
                                    <!--Input Nom-->
                                    <input type="text" class="form-control form-control-lg mb-2" name="name" id="nom" required placeholder="Nom" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ0-9]{3,50}">
                        </div>                
                    </div>
                </div>
                <!--Input Date de naissance-->
                <input type="date" class="form-control form-control-lg mb-2" name="datedenaissance" id="datedenaissance" required placeholder="Date" <?php include 'Include/limiterBirthdate.php' ?>>
                <!--Input Adresse-->
                <input type="text" class="form-control form-control-lg mb-2" name="adresse" id="adresse" required placeholder="Adresse" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ0-9\s]{2,50}">
                <!--Input Code Postal-->
                <input type="number" class="form-control form-control-lg mb-2" name="codePostal" id="codePostal" required placeholder="code postal" min="10000" max="98000">
                <!--Input ville--> 
                <input type="text" class="form-control form-control-lg mb-2" name="ville" id="ville" required placeholder="Ville" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ0-9]{2,50}">

                

                <!--Input Submit-->*
                        
                <input type="submit" class="btn btn-light bg-dark bg-gradient text-light btn-lg w-100 d-flex justify-content-center align-items-center mb-2" value="S'inscrire">
                    
            </form>
        </div>   

</body>
</html>