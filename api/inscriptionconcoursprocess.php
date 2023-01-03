<?php include('../objets/inscriptionobjet.php') // on inclue l'objet utilisateur dans ce processus ?>   
<?php include('../Include/db.php') // Ainsi que la base de données pour être en mesure d'uploader les informations de l'api ?>
<?php


if ($utilisateur->identifiant == null) {          // Si l'utilisateur n'est pas connecté
    die("vous n'êtes pas connecté");
   
}


if (isset($_POST['chansonchoisie']) && !empty($_POST['chansonchoisie'])) {                     // Si il y a une chanson choisie
    $monchoix = $_POST['chansonchoisie'];                                                   // assigner la chanson sur une variable
    $currentdate= date("Y-m-d");
    echo $monchoix;

    
    $etatCheckUser = $bdd->prepare(      // on vérifie si l'utilisateur est présent, car s'il l'est, c'est qu'il a déjà envoyé sa demande
        "SELECT COUNT(*) FROM `participation` WHERE utilisateur = '$utilisateur->identifiant'"
    );
    $etatCheckUser->execute();
    $resultUser = $etatCheckUser->fetchAll();
    $resultUser2 = $resultUser[0]['COUNT(*)'];

    $etatCheckUserT2 = $bdd->prepare(      // on vérifie si l'utilisateur est présent, car s'il l'est, c'est qu'il a déjà envoyé sa demande
        "SELECT COUNT(*) FROM `admis` WHERE utilisateur = '$utilisateur->identifiant'");
    $etatCheckUserT2->execute();
    $resultUserT2 = $etatCheckUserT2->fetchAll();
    $resultUser2T2 = $resultUserT2[0]['COUNT(*)'];
    
    
    


                                                                                            
        if ($resultUser2 > 0 || $resultUser2T2 > 0) {                                                                
            echo "true";                                                                   // METTRE UNE ERREUR SI L'UTILISATEUR VEUT REMETTRE UNE MUSIQUE
            $_SESSION['alreadysubmittedtitle'] = "Vous avez déjà soumis une proposition";
            header ("Location: inscriptionconcours.php");
        }
                    // Si l'utilisateur n'a pas encore choisi de chanson alors on lance le Else
        else {        // VERIFIER SI LA CHANSON EST DEJA PRISE 
                                                    
            $etatCheckSong = $bdd->prepare("SELECT COUNT(*) FROM `participation` WHERE titre = :choix");
            $etatCheckSong->bindValue(':choix', $monchoix, PDO::PARAM_STR);
            $etatCheckSong->execute();
            $resultSong = $etatCheckSong->fetchAll();
            $resultSong2 = $resultSong[0][0];            // renvoie 1 si la chanson existe déjà

            // on vérifie également si la chanson est déjà prise sur la table 3

            $etatCheckUserSongT3 = $bdd->prepare(      
            "SELECT COUNT(*) FROM `admis` WHERE titre = '$monchoix'");
             $etatCheckUserSongT3->execute();
            $resultUserSongT3 = $etatCheckUserSongT3->fetchAll();
            $resultUser2SongT3 = $resultUserSongT3[0]['COUNT(*)'];
        
            
            
            

        // A MODIFIER URG URG URG URG


        if ($resultSong2 > 0 || $resultUser2SongT3 > 0) {
                    header("Location: inscriptionconcours.php");
                    $_SESSION['sondejapris'] = "Ce son est déjà pris";
        }   else {
                                                                                                  // Si toutes les conditions sont remplies on bombarde, et on met les acceptations en false pour l'admin
                    $etatSubmit = $bdd->prepare(
                        "INSERT INTO `participation`(`date`, `utilisateur`, `titre`, `titre_acceptation`, `audio`, `audio_acceptation`,`cheque_recu`, `valider_cheque`) VALUES (:datesoumission, :utilisateur ,:titre, :titre_acceptation, :audio, :audio_acceptation, :cheque_recu, :valider_cheque)"
                    );
                    $etatSubmit->bindValue(':datesoumission', $currentdate, PDO::PARAM_STR);
                    $etatSubmit->bindValue(':utilisateur', $utilisateur->identifiant, PDO::PARAM_STR);
                    $etatSubmit->bindValue(':titre', $monchoix, PDO::PARAM_STR);
                    $etatSubmit->bindValue(':titre_acceptation', 'false', PDO::PARAM_STR);
                    $etatSubmit->bindValue(':audio', '', PDO::PARAM_STR);
                    $etatSubmit->bindValue(':audio_acceptation', 'false', PDO::PARAM_STR);
                    $etatSubmit->bindValue(':cheque_recu', 'non', PDO::PARAM_STR);
                    $etatSubmit->bindValue(':valider_cheque', 'false', PDO::PARAM_STR);
                    
                    
                    
                    
                    
                    $etatSubmit->execute();
                    header("Location: inscriptionconcours.php");
                }                                                
        }
    

   




}
else {
    header("Location: ../api/inscriptionconcours.php");                                // Si l'utilisateur n'a pas choisi de son, il sera renvoyé à la page précédente,
    $_SESSION['songmissing'] = "vous n'avez pas selectionné de musique";               // qui contient un paragraphe renvoyant l'erreur inscrite à droite
}


?>