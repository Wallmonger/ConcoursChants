<?php
include("../objets/inscriptionobjet.php");
include('../Include/db.php');
$tableuser = $_POST['selectedinscription'];                                     // utilisateur dont le bouton a été appuyé
			if ($_POST['submitinscription'] == "confirmer") { 								// si autorisé, désautoriser.
				
                
                $etatfetch = $bdd->prepare("SELECT * FROM `participation` WHERE utilisateur = '$tableuser';");
                $etatfetch->execute();
                $resultats = $etatfetch->fetchAll();
                $recherche = $resultats[0];
                
                $dateuser = $recherche['date'];
                $user = $recherche['utilisateur'];
                $titre = $recherche['titre'];
                $audio = $recherche['audio'];
                $dateadmin = date("Y-m-d");
                

                $etatadmis = $bdd->prepare(
                    "INSERT INTO `admis`(`date`, `utilisateur`, `titre`, `audio`, `dateadmin`) VALUES (:dateuser,:user,:titre,:audio,:dateadmin)"
                );
                      $etatadmis->bindValue(':dateuser', $dateuser, PDO::PARAM_STR);
                      $etatadmis->bindValue(':user', $user, PDO::PARAM_STR);
                      $etatadmis->bindValue(':titre', $titre, PDO::PARAM_STR);
                      $etatadmis->bindValue(':audio', $audio, PDO::PARAM_STR);
                      $etatadmis->bindValue(':dateadmin', $dateadmin, PDO::PARAM_STR);
                      
                  
                $etatadmis->execute();

                $etatdelete = $bdd->prepare(
                    "DELETE FROM `participation` WHERE utilisateur = '$tableuser'"
                );
                $etatdelete->execute();

                header("Location: admin.php");
                
            }

                else {
                    header("Location: admin.php");
                }
           
               
	?>