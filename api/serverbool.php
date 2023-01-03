<?php include('../Include/db.php'); ?>
<?php include('../objets/inscriptionobjet.php'); ?>

<?php 
      

        // On vérifie avec cette requête, les paramètres booléens de l'utilisateur (confirmations admin)

$etatverif = $bdd->prepare(
"SELECT * FROM `participation` WHERE utilisateur = '$utilisateur->identifiant'"            // On est en mesure de récupérer l'identifiant grâce à l'include de la classe.
);

$etatverif->execute();
$resultverif = $etatverif->fetchAll();
$verif1 = $resultverif[0]['titre_acceptation'];
$verif2 = $resultverif[0]['audio_acceptation'];
$verif3 = $resultverif[0]['valider_cheque'];
$verifapi = $resultverif[0]['titre'];
$verifsong = $resultverif[0]['audio'];
$verifcheque = $resultverif[0]['cheque_recu'];


// On vérifie si l'utilisateur a déjà finalisé son inscription, si oui on envoie vo, sinon vn 
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




<?php if($verif1 == 'true') {
    echo "1o";     
} else {
    echo "1n";
} ; ?>


<?php if($verif2 == 'true') {
    echo "2o";    
} else {
    echo "2n";
}; ?>

<?php if($verif3 == 'true') {
    echo "3o";    
} else {
    echo "3n";
}; ?>

<?php if($verifapi == "") {
    echo "4n";    // la catégorie titre est vide et donc, l'utilisateur n'a pas rentré de son
} else {
    echo "4o";   // la catégorie n'est pas vide, donc l'utilisateur a bien entré ses informations.
} ?>

<?php if($verifsong == "") {
    echo "5n";    // la catégorie titre est vide et donc, l'utilisateur n'a pas rentré de son
} else {
    echo "5o";   // la catégorie n'est pas vide, donc l'utilisateur a bien entré ses informations.
} ?>

<?php if($verifcheque == "non") {
    echo "6n";    // la catégorie titre est vide et donc, l'utilisateur n'a pas rentré de son
} else {
    echo "6o";   // la catégorie n'est pas vide, donc l'utilisateur a bien entré ses informations.
} ?>




