<?php

include("./Outils/connexionBdD.php");
//page qui créé un profil
?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="./Outils/style.css" />
			<title>page d'inscription</title>
		</head>
		<body>
				
		<div id="squelette">
		<h1>Inscription</h1>
		
		<?php 
			
			
			
			include("./Outils/base.php");
			createUser();
			
		?>
		<a href="./index.php">vous pouvez vous connectez </a>
		</div>
	</body>
	</html>