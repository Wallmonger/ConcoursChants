<?php include('objets/inscriptionobjet.php') ?>
<?php include('Include/connectedlocker.php') ?>
<?php include('Include/db.php') ?>


<!doctype html>
<html lang="fr">
<head>
        <meta charset="utf-8">
    <title> Facture </title>
    <link rel="stylesheet" href="CSS/facture.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">   // BOOTSTRAP
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
    <?php include("Include/arnaque.php"); ?>
    <input type="button" value="Imprimer cette page" onClick="window.print()">
    <button class="retour"><a href="mon_compte.php">Retour</button></a>
    <div class="adresses">
    <img src="CSS/image/logo2.png" alt="logo" title="Voir" />
    <div class="chant">
        <p>13 rue de l'arnaque<br>62500 SAINT-OMER<br>FRANCE</p>
    </div>
</div>
        
        <div class="compte">
            <div class="participant"><p><strong>Participant:</strong></p></div>
            <p><?php echo $utilisateur->nom ?>
            <br><?php echo $utilisateur->prenom ?>
            <br><?php echo $utilisateur->adresse ?>
            <br><?php echo $utilisateur->codepostal ?>
            <?php echo $utilisateur->ville ?></p>
            
        </div>
    <div class="document">
        <p><center><strong>FACTURE</strong></center></p>
    </div>
    <div class="date">

<!-- Je rajoute un numéro de facture  -->
<p> Numéro de facture <?php echo($_SESSION['id']) ?>
<br>
<?php
$jour = date("d/m/Y");
echo("Date:".$jour."");
?>
<table>
        <caption>Concours de Chants Singer</caption>
        <tr> <th>Produit</th> <th class="quantite">Quantité</th> <th class="prix">Prix</th> </tr>
        <tr> <td>Inscription avec pour titre 
        <?php 

        $stateuser = $bdd->prepare(
        "SELECT * FROM `admis` WHERE utilisateur = '$utilisateur->identifiant'"            // On est en mesure de récupérer l'identifiant grâce à l'include de la classe.
        );
        $stateuser->execute();
        $resultstateuser = $stateuser->fetchAll();
        $resultstateuserfinish = $resultstateuser[0]['titre'];
        echo $resultstateuserfinish;

        ?>
</td> <td class="quantite">1</td> <td class="prix">40€</td> </tr>
</table>

<div class="total">
    <p><strong>Total TTC: 40€</strong></p>
</div>

</body>
<footer>
    <div id="Mentions légales:">
        <p>
            Mentions légales<br> Conformément à la loi 92.1142, en cas de retard de paiement, toute somme, y compris l'acompte, non payée à sa date d'éxigibilité produira de plein droit des intérêts de retard équivalents au triple du taux d'intérêt légal de l'année en cours ainsi que le paiement d'une somme forfaitaire de vingt (20) euros due au titre des frais de recouvrement conformément au décret N°2012-1115.
        </p>
    </div>
    <div id="Coordonnées Bancaires">
        <p><em>Mode de paiement : Chéques</p>
    </div>
</footer>
</html>