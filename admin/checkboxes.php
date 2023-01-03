<?php

include('connection.php');
$tableuser = $_POST['selecteduser'];                                     // utilisateur dont le bouton a été appuyé
			if ($_POST['submitsong'] == "true") { 								// si autorisé, désautoriser.
				echo "c'est true l'machin";
               

                $insertsong = "UPDATE `participation` SET `titre_acceptation`='false' WHERE utilisateur = '$tableuser'";
                $db->query($insertsong);
			}
			else if ($_POST['submitsong'] == "false") {             // Si l'utilisateur a autorisé, il peut changer son choix
				echo "c'est faux le truc muche";
                $insertsong = "UPDATE `participation` SET `titre_acceptation`='true' WHERE utilisateur = '$tableuser'";
                $db->query($insertsong);
			}
			

           
															// on recharge la page discretos pour mettre à jour les changements
            header("Location: admin.php");
	?>