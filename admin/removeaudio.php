<?php

include('connection.php');
$tableuser = $_POST['selectedremoveaudio'];                                     // utilisateur dont le bouton a été appuyé
			
               

            $removeaudio = "UPDATE `participation` SET `audio`='' WHERE utilisateur = '$tableuser'";
            $db->query($removeaudio);
			
			

           
															// on recharge la page discretos pour mettre à jour les changements
            header("Location: admin.php");
	?>