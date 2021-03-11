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
		
		<?php //formulaire d'incription dans cette page 
			error_reporting(E_ALL);
			
			
			
			
					if(isset($_POST['submit'])){
				$pseudo=trim($_POST['newpseudo']);
				$password=trim($_POST['newpasswd']);
				$repeatpassword=trim($_POST['repeatpassword']);
				$email=trim($_POST['email']);
				$description=trim($_POST['description']);
				
				if(empty($pseudo)){
					$errors[]="Pseudo incorrect";
					
				}
				if(empty($password)){
					$errors[]="password incorrect";
				}
				if($repeatpassword != $password){
					$errors[]="répéter votre mots de passe à l'identique";
				}
				if(empty($email)){
					$errors[]="email incorrect";
				}
			
				
		if(!empty($errors)){
					foreach($errors as $value){
						echo"<div class='erreur'>".$value."</div>";
					}
				}
			}

		?>
		
		
			<form method='POST' action="creation.php">
			 <label for='sexe'>Sexe</label>
				<select name="sexe">
				
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				
				</select>
				</br>
				</br>
				
				<label for="pseudo">Votre pseudo : </label>
				<input type="text" name="newpseudo" placeholder="Choisissez un pseudo" value="" />
				</br></br>
				<label for="password">Votre mot de passe : </label>
				<input type="password" name="newpasswd" placeholder="choisissez un mots de passe" value="" />
				</br></br>
				<label for="repeatpassword">répétez votre mot de passe : </label>
				<input type="password" name="repeatpassword" placeholder="répéter votre mots de passe" value="" />
				</br></br>
				<label for="email">Veuillez saisir votre email : </label>
				<input type="email" name="email" placeholder="votre adresse mail">
				</br></br>
				<label for="description"> Si vous voulez ajouter une description : </label>
				<textarea rows="8" cols="30" name="description"></textarea>
				</br>
				</br>
				</br>
				<input type="submit" name="submit" value="Créer un compte" />
				</br>
				</br>
			</form>
			<a href="./index.php">Si vous êtes déjà inscrit </a>
				</br></br>
				
				
		</div>
	</body>
	</html>