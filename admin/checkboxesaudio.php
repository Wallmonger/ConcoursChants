<?php

include('connection.php');
$tableuser = $_POST['selectedsong'];                                     // utilisateur dont le bouton a été appuyé
			if ($_POST['submitaudio'] == "true") { 								// si autorisé, désautoriser.
				echo "c'est true l'machin";
               

                $insertaudio = "UPDATE `participation` SET `audio_acceptation`='false' WHERE utilisateur = '$tableuser'";
                $db->query($insertaudio);
			}
			else if ($_POST['submitaudio'] == "false") {             // Si l'utilisateur a autorisé, il peut changer son choix
				echo "c'est faux le truc muche";
                $insertaudio = "UPDATE `participation` SET `audio_acceptation`='true' WHERE utilisateur = '$tableuser'";
                $db->query($insertaudio);
			}
			

           
															// on recharge la page discretos pour mettre à jour les changements
            header("Location: admin.php");
	?>