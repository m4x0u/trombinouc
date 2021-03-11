<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="./Outils/style.css" />
			<title>page d'accueil</title>
		</head>
		<body>

		<div id="squelette">
		<h1>Trombinouc</h1>
		
		<?php
	
		error_reporting(E_ALL);
		if(isset($_POST['submit'])){
				$pseudo=trim($_POST['pseudo']);
				$password=trim($_POST['passwd']);
				
				if(empty($pseudo)){
					$errors[]="Pseudo incorrect";
					
				}
				if(empty($password)){
					$errors[]="password incorrect";
				}
			
				
		if(!empty($errors)){
					foreach($errors as $value){
						echo"<div class='erreur'>".$value."</div>";
					}
				}
			}
		
		?>
		
		
		
		
		
		
		
		
		
		
		
		<p>Connectez-vous</p>
		<form method="POST" action="connect.php">
		<input type="text" name="pseudo" placeholder="votre pseudo" value="" />
		<input type="password" name="passwd" placeholder="mots de passe" value="" />
		<br>
		<br>
		<input type="submit" name="submit" value="Se connecter" />
		<br>
		<br>
		</form>
		
		</form>
		<a href="./inscriptions.php">si vous n'êtes pas inscrit veuillez vous inscrire</a>
		<br>
		<br><br>
		<br><br>
		<br><br>
		<br>
		</div>
		</body>
		</html>