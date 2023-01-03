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
    <h1>PAYEZ 40€</h1>
    </div>
        <form action="" method="POST" class="d-flex justify-content-center flex-column">    
            <input type="submit" value="submitmoney" name="submitmoney" class="btn btn-primary">  
        </form>


</body>
</html>

<?php
if ($utilisateur->identifiant == "") {
    header ("Location: ../index.html");                            // Si personne est connecté, ça part direct au menu
}

if (isset($_POST['submitmoney'])) {
    echo "oui";

        $updateArgent = $bdd->prepare("UPDATE `participation` SET `cheque_recu`='oui' WHERE utilisateur = '$utilisateur->identifiant'");  //on update seulement la partie audio
        $updateArgent->execute();
        header("Location: inscriptionconcours.php");

    
} else {
    echo "non";
}

?>