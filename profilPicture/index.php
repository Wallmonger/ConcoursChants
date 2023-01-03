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
    <link rel="stylesheet" href="profilPicture.css">
</head>
<body>
    <div class="container-fluid h-50">
        <h1 class="text-center letterone">Choisissez votre image de profil</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center flex-column">
        
        
        <input type="file" name="uploaded_file" class="form-control w-50"> <br>
        <input type="submit" value="submit" name="submit" class="btn btn-info w-50">
   
</form>


</body>
</html>

<?php


if ($utilisateur->identifiant == "") {
    header ("Location: ../index.html");                            // Si personne est connecté, ça part direct au menu
}







if(isset($_POST['submit'])){
    
    $maxSize = 100000000;    // Taille maximale -> 10million = 10 mo
    
    $validExt = array('.png', '.jpeg', '.jpg');    // Array d'extensions qui sera parcourue plus tard
     

    if ($_FILES['uploaded_file']['error'] > 0)                   // Lorsqu'il y a une erreur dans le script
    {
        echo 'une erreur est survenue lors du transfert';        
        die;                                                  // die arrête le script
    } 
    
    $fileSize = $_FILES['uploaded_file']['size']; 


    if($fileSize > $maxSize) {
        echo "le fichier est trop gros";
        die;
    }
    $fileName = $_FILES['uploaded_file']['name'];
    $fileExt = "." . strtolower(substr(strchr($fileName, '.'), 1));          // on converti le texte en lowercase, p
   
    if (!in_array($fileExt, $validExt)) 
    {
        echo "ce n'est pas un bon type de fichier";
        die;
    }
    
    $tmpName = $_FILES['uploaded_file']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));                       // génére un id unique, (fonction uniqid)
    $fileName = "../profilPicture/uploadimg/" . $uniqueName . $fileExt;                // chemin d'accès au fichier 
    $resultat = move_uploaded_file($tmpName, $fileName);           // transfert
    
    if ($resultat) {
        echo "transfert terminé !";

        // ECRIRE ICI ##################################
        $updateAudio = $bdd->prepare("UPDATE `profil` SET `profilpic`='$fileName' WHERE identifiant = '$utilisateur->identifiant'");  //on update seulement la partie audio
        $updateAudio->execute();
        $_SESSION['profilpic'] = $fileName;
        header("Location: ../mon_compte.php");
        
    }
    else {
        echo "encore un coup du proxy";
    }


}

echo $fileName;





?>
