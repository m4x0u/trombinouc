<?php
session_start();

include("./Outils/connexionBdD.php");
//page "d'entre deux" pour vérifier si le mot de passe est correct
?>

<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="./Outils/style.css" />
			<title>page client</title>
		</head>
		<body>
				
		<div id="squelette">
		<h1>page client</h1>
		
		<?php 
			
			
			
			include("./Outils/base.php");
			verification();
			
		?>
		
		</div>
	</body>
	</html>