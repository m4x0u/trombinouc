<?php
include("../Outils/Menu.php");
include("../Outils/fonctionEcrire.php");
?>
	<h3>Rédiger une publication </h3>
	
	<form method="POST" action="">
		<textarea id='ecrire' name="publication" rows="15" cols="60">

</textarea>
		</br>
		</br>
		<input type="submit" name="submit" value="Valider" />
	</form>


<?php if(isset($_POST['submit'])){
	ecrire();
	
	
}
	
	?>



	</div>
	</body>
	</html>