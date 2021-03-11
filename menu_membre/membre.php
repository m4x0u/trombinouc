<?php
include("../Outils/Menu.php");
//page de base avec notre profil
?>
			
			<div class='infos'>
			<br>
<br>

			<p><strong><u>Email :</strong></u><em><?php echo $lesEnreg[0]['email'];?></em></p>
			<a href="./changerInfos.php"><img src="../image/<?php echo $lesEnreg [0]['image']; ?>" height='150' width='150' alt='photo-profil'> </a>
			<p><strong><u>Ma splendide description:</u>  </strong><?php echo $lesEnreg[0]['description'];?></p>
			<p><a href="./changerInfos.php">Changer informations</a>
			
			
			
			</div>



<br><br>
<br>
<br>



			
		</div>
	</body>
	</html>