<?php

include('connection.php');
$tableuser = $_POST['selectedcheque'];                                     // utilisateur dont le bouton a été appuyé
			if ($_POST['submitcheque'] == "true") { 								// si autorisé, désautoriser.
				echo "c'est true l'machin";
               

                $insertcheque = "UPDATE `participation` SET `valider_cheque`='false' WHERE utilisateur = '$tableuser'";
                $db->query($insertcheque);
			}
			else if ($_POST['submitcheque'] == "false") {             // Si l'utilisateur a autorisé, il peut changer son choix
				echo "c'est faux le truc muche";
                $insertcheque = "UPDATE `participation` SET `valider_cheque`='true' WHERE utilisateur = '$tableuser'";
                $db->query($insertcheque);
			}
			

           
															// on recharge la page discretos pour mettre à jour les changements
            header("Location: admin.php");
	?>