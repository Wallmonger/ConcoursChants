<?php include('../objets/inscriptionobjet.php') ?>
<?php include('../Include/db.php'); ?>
<?php include('../Include/connectedlocker.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUT D'image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/mdp.css">
</head>
<body>
<video src="../CSS/video/video_fond.mp4" autoplay loop muted></video>
<div class="fond">
    <div class="container-fluid h-50">
        <h2 class="text-center letterone">Entrez votre nouveau mot de passe</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center flex-column">
        
        
        <input type="password" name="uploaded_pswd" placeholder="Tapez ici" class="form-control w-50"> <br>
        <input type="submit" value="Modifier" name="submit" class="btn btn-light w-25">

</form>
</div>

</body>
</html>

<?php


if ($utilisateur->identifiant == "") {
    header ("Location: ../index.html");                            // Si personne est connecté, ça part direct au menu
}



if(isset($_POST['submit'])){
    $password = $_POST['uploaded_pswd'];
    $passwordhashed = password_hash($password, PASSWORD_DEFAULT);             // hachage du mot de passe
        // ECRIRE ICI ##################################
        $updatePswd = $bdd->prepare("UPDATE `profil` SET `pswd`='$passwordhashed' WHERE identifiant = '$utilisateur->identifiant'");  //on update l'email
        $updatePswd->execute();
        $_SESSION['pswd'] = $password;
        header("Location: ../mon_compte.php");
        
    }
    else {
        // echo "encore un coup du proxy";
    };


?>
