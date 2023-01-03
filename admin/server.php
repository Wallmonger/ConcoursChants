<?php 
include("../admin/connection.php");

 ?>
	<!-- CSS only -->
	<link rel="stylesheet" href="../CSS/admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<table class="table bg-dark text-light">												<!-- Créer des indicateurs de tableaux -->
			<thead>
				<th>Date</th>
				<th>Utilisateur</th>
				<th>Titre</th>
				<th>Accepter titre</th>
				<th>Audio</th>
				<th>Delete audio</th>
				<th>Accept audio</th>
				<th>Chèque reçu</th>
				<th>Valider cheque</th>
				<th>Valider Inscription</th>
			</thead>
<?php 
	$query = mysqli_query($db, "SELECT * FROM participation");			// Selectionner toutes les colonnes du tableau
	while($row = mysqli_fetch_array($query)){                         // assigner chaque contenu de colonne à une variable

		$date = $row['date'];
		$user = $row['utilisateur'];
		$titre = $row['titre'];
		$titreaccept = $row['titre_acceptation'];
		$audiolink = $row['audio'];
		$audioaccept = $row['audio_acceptation'];
		$chequerecu = $row['cheque_recu'];
		$validcheque = $row['valider_cheque'];
 ?>
			<tbody class="tbody bg-dark text-light">
				<tr>
					<td><?php echo $date; ?></td>	<!-- pour chaque colonne,  créer une ligne d'un tableau qui regroupe toutes les données -->
					<td><?php echo $user; ?></td>
					<td><?php echo $titre; ?></td>
					<td>
						<form action="checkboxes.php" method="POST" id="formulaireenvoititre">
							<input type="hidden" name="selecteduser" value="<?php echo $user?>">	   <!-- on met user en hidden, pour pouvoir le récupérer en php et faire le lien avec la bdd -->
							<input type="submit" class="ouais" name="submitsong" value="<?php echo $titreaccept; ?>">   <!-- on créer un boutton submit qui vérifiera la valeur du titre (true ou false), et la changera en php -->
						</form>
					</td>
					<td><button class="trigger <?php if ($audiolink == "") {echo "ouais";} else {echo "audio-activated";}?>" id="trigger" onclick="moncu('<?php echo $audiolink ?>')">&#9658</button></td>       <!-- on créer un bouton qui éxecutera une fonction avec comme paramètre le lien récupéré de la bdd -->
					<td>
							<form action="removeaudio.php" method="POST" id="formulairedeleteson">    <!-- confirmer audio ou non -->
								<input type="hidden" name="selectedremoveaudio" value="<?php echo $user?>">	   
								<input type="submit" class="ouais" name="submitaudio" value="Remove">
							</form>
					</td>
					<td>
						<form action="checkboxesaudio.php" method="POST" id="formulaireenvoison">    <!-- confirmer audio ou non -->
							<input type="hidden" name="selectedsong" value="<?php echo $user?>">	   
							<input type="submit" class="ouais" name="submitaudio" value="<?php echo $audioaccept; ?>">
						</form>

					</td>
					
					<td> <button class="ouais" style="background-color: <?php if ($chequerecu == "oui"){echo "green";} else {echo "red";}  ?>"> <?php echo $chequerecu ?> </button> </td>

					<td>
						<form action="checkboxescheques.php" method="POST" id="formulaireenvoicheque">  <!-- confirmer l'inscription utilisateur -->
							<input type="hidden" name="selectedcheque" value="<?php echo $user?>">	   
							<input type="submit" class="ouais" name="submitcheque" value="<?php echo $validcheque; ?>">   
						</form>
					</td>

					<td>
						<form action="newchallenger.php" method="POST" id="formulaireenvoiinscription">  <!-- confirmer l'inscription utilisateur -->
							<input type="hidden" name="selectedinscription" value="<?php echo $user?>">	   
							<input type="submit" class="ouais" name="submitinscription" value="confirmer">   
						</form>
					</td>
					
					
					
					
					
				</tr>
			</tbody>
<?php 	} ?>
		</table>


