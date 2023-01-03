<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUT D'AUDIO</title>
</head>
<body>
    <div class="container-fluid h-50">
        <h1>Choisissez votre musique</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" class="d-flex justify-content-center flex-column">
        
        
        <input type="file" name="uploaded_file" class="form-control"> <br>
        <input type="submit" value="submit" name="submit" class="btn btn-success">
   
</form>


</body>
</html>

<?php


if ($utilisateur->identifiant == "") {
    header ("Location: ../index.html");                            // Si personne est connecté, ça part direct au menu
}

$etatCheckUser = $bdd->prepare(                                                            // on vérifie si l'utilisateur est présent, et a déjà séléctionné un titre
    "SELECT * FROM `participation` WHERE utilisateur = '$utilisateur->identifiant'"
);

$etatCheckUser->execute();
$resultUser = $etatCheckUser->fetchAll();

$resultUser2 = $resultUser[0]['audio'];
if ($resultUser2 === "") {
    






if(isset($_POST['submit'])){
    
    $maxSize = 100000000;    // Taille maximale -> 10million = 10 mo
    
    $validExt = array('.wma', '.ogg', '.aiff', '.wav', '.mp3');    // Array d'extensions qui sera parcourue plus tard
     

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
        echo "ce n'est pas un fichier audio";
        die;
    }
    
    $tmpName = $_FILES['uploaded_file']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));                       // génére un id unique, (fonction uniqid)
    $fileName = "../ImageTacker/upload/" . $uniqueName . $fileExt;                // chemin d'accès au fichier 
    $resultat = move_uploaded_file($tmpName, $fileName);           // transfert
    
    if ($resultat) {
        echo "Votre son a bien été traité !";

        // ECRIRE ICI ##################################
        $updateAudio = $bdd->prepare("UPDATE `participation` SET `audio`='$fileName' WHERE utilisateur = '$utilisateur->identifiant'");  //on update seulement la partie audio
        $updateAudio->execute();

    }
    else {
        echo "encore un coup du proxy";
    }


}




}
else {
    echo 'Vous avez déjà envoyé un fichier';
}


?>
