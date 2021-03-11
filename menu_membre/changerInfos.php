<?php
include("../Outils/Menu.php");
?>
			<h3><u>Changer vos informations<u></h3>
			
			<div class='infos'>
			
				
				
				
				<img src="../image/<?php echo $lesEnreg [0]['image']; ?>" height='200' width='200' alt='photo-profil'>
						<form method='POST' action=''enctype='multipart/form-data'>
			<input type="file" name="avatar">
			</br>
			</br>
			<input type="submit" value="Valider" name="submit">
			</form>
			
			
			<?php
			if(isset($_FILES['avatar']['name'])){
			$target_dir = "../image/";
			$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Vérifie si le fichier image est une image réelle ou autre chose
			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["avatar"]["tmp_name"]);
			  if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			  } else {
				echo "Le fichier n'est pas une image.";
				$uploadOk = 0;
			  }
			}
			// vérifie si le fichier exist déjà dans notre dossier avec les images
			if (file_exists($target_file)) {
			  
			  $tab = array('image' => $_FILES['avatar']['name']);
				//print_r($tab) ;
				$sql = " UPDATE utilisateurs SET image =:image WHERE id='{$_SESSION['id']}'";
				//echo $sql;
				$res = $GLOBALS["bd"]->prepare($sql);
				$res->execute($tab) or die(print_r($res->errorInfo()));
			  header("Location:./membre.php");
			 

			}

			// vérifie la taille des images
			if ($_FILES["avatar"]["size"] > 100000000) {
			  echo "Désolé,votre image est trop large.";
			  $uploadOk = 0;
			}
			// vérifie le formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  echo "désolé, seul JPG, JPEG, PNG & GIF files sont autorisé.";
			  $uploadOk = 0;
			}
			// vérifie si $uploadOk est égale à 0 ce qui voudrait dire qu'il y a une erreur
			if ($uploadOk == 0) {
			  echo "Désolé,votre fichier n'a pas été uplodé.";
			 
			// upload l'image
			} else {
			  if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
				$tab = array('image' => $_FILES['avatar']['name']);
				//print_r($tab) ;
				$sql = " UPDATE utilisateurs SET image =:image WHERE id='{$_SESSION['id']}'";
				//echo $sql;
				$res = $GLOBALS["bd"]->prepare($sql);
				$res->execute($tab) or die(print_r($res->errorInfo()));
				
				header("Location:./membre.php");
				exit();
				
			  } else {
				echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
			  }
			}
			}

			?>
			</div>
				</br>
				</br>
				
				
				
				<form method='POST' action="">
			 <label for='sexe'>Sexe</label>
				<select name="sexe">
				
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				
				</select>
				</br>
				</br>
			
			
				<label for="pseudo">Votre pseudo : </label>
				<input type="text" name="pseudo" placeholder="Choisissez un pseudo" value="<?php echo $lesEnreg[0]['pseudo'];?>" />
				</br></br>
				<label for="email">Veuillez saisir votre email : </label>
				<input type="email" name="email" placeholder="votre adresse mail" value="<?php echo $lesEnreg[0]['email'];?>">
				</br></br>
				<label for="description"> Si vous voulez changer de description : </label>
				<textarea rows="8" cols="30" name="description" ><?php echo $lesEnreg[0]['description'];?></textarea>
				</br>
				</br>
				</br>
				<input type="submit" name="submit_infos" value="Valider" />
				</br>
				</br>
			</form>
			<?php
			if(isset($_POST['submit_infos'])){
						include ("../Outils/fonctionChangerInfos.php");
						changer_infos();
					echo 'salut';
				header("Location:./membre.php");
				exit();
			}
			
			
			
			
			?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
			
		
			
			






			
		</div>
	</body>
	</html>