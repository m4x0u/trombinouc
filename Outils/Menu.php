<?php
	session_start();
	include("../Outils/connexionBdD.php");
	
		if(empty($_SESSION['id'])){
			header("Location:../index.php");
			exit();
				}
				

			
				
?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../Outils/style.css" />
			<title>page membre</title>
		</head>
		<body >
				
		<div id="squelette">
		<br>
		<?php
		
			
		
		
		include ("../Outils/fonction-membre.php");
		

		
		$lesEnreg= infos_membre();
		
		echo '<p class="Bonjour">Bonjour '.$lesEnreg[0]['pseudo'].'</p>'
		
		
		?>
		</br>
		</br>
		<div id ='déconnection'> 
		<a class='déconnection' href="../Outils/deconnection.php"> Se déconnecter </a><br>
		</div>
		<br>
		<div class="inner">
					<nav id="menu">
						<a class='Menu' href="./publication.php">Accueil/publication </a>
						<a class='Menu'href="./amie.php">Les amis</a>
						<a class='Menu'href="./invitation.php">Invitation(s) <?php $nb_invit=nb_invitation(); echo $nb_invit;?></a>
						<a class='Menu'href="./membre.php">Mon profil</a>
						<a class='Menu'href="./listeMembre.php">Membres inscrits <?php $nb= nombre_membre(); echo $nb[0][0]; ?></a>
						
						
					</nav>	
			</div>
			<!-- la suite est la partie qui change en fonction des pages   -->
			
			
			
			
