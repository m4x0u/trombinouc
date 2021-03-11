<?php
include("../Outils/Menu.php");
include("../Outils/fonctionRepondre.php");
//page pour répondre a une publication
?>

	<h3>Répondre </h3>
	
	<form method="POST" action="">
		<textarea id='ecrire' name="reponse" rows="15" cols="60">

</textarea>
		</br>
		</br>
		<input type="submit" name="submit" value="Valider" />
	</form>


<?php if(isset($_POST['submit'])){
	repondre();
	
	
}
	
	?>



	</div>
	</body>
	</html>