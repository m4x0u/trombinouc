<?php
include("../Outils/Menu.php");
?>
			
			
			<h3> La liste des membres </h3>
			
			<?php
			include("../Outils/fonctionListeMembre.php");
			$lesEnreg =recup_pseudo_image();
			//parcours le tableu
			$i = (count($lesEnreg))-1;
			if ($i == -1){
				echo "<div class='erreur'> Vous êtes le seul membre pour l'instant.</div>";
			}
			else{
			while ($i >=0) {
				?>
				
				<p><a href='./profilDesAutres.php?page=profile&pseudo=<?php echo $lesEnreg[$i]['pseudo'];?>'><?php echo $lesEnreg[$i]['pseudo']; ?></a></p>
				<div class="PhotoPageListeMembre">
				<a href='./profilDesAutres.php?page=profile&pseudo=<?php echo $lesEnreg[$i]['pseudo'];?>'><img src="../image/<?php echo $lesEnreg [$i]['image']; ?>" height='100' width='100' alt='photo-profil'></a>
				</div>
				<br>
				<br>
				<br>
				<br>
				<?php



				$i = $i-1;
			}
			}
			?>
			<br>
			<br><br><br>
			
			
			
			
			
			
			
			
			
	</div>
	</body>
	</html>