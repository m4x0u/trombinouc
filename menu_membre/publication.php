<?php
include("../Outils/Menu.php");
?>
	<h3>Les publications </h3>
	
	<a href='ecrire.php'>Rédiger une publication</a>


	<?php //agencement de publication et lecture tableau
			include("../Outils/fonctionRecupPubli.php");
			include("../Outils/fonctionVerifVoirPubli.php");
			include("../Outils/fonctionRecupRep.php");
			$lesEnreg =recup_publication();
			$listeAutoris=verif_publi();
			$nomSession=nomSession();
			echo '</br>';
		
			//print_r($listeAutoris);
	
			echo '</br>';
			echo '</br>';
			//print_r($lesEnreg);
			
		 $i = (count($lesEnreg)-1);
		  $n = (count($listeAutoris)-1);
		  
			if ($i == -1){
				echo "<div class='erreur'> Pas de publication pour l'instant</div>";
			}
			
			foreach($lesEnreg as $publication){
				foreach($listeAutoris as $mesAmis){
					if($mesAmis['pseudo_exp'] == $nomSession){
						$pseudoDeMonAmi = $mesAmis['pseudo_dest'];
					}else{
						$pseudoDeMonAmi = $mesAmis['pseudo_exp'];
					}
					if($publication['pseudo_publi'] == $pseudoDeMonAmi or $publication['pseudo_publi'] == $nomSession){
						echo '<br>';
						echo '----------------------------------------------------------';
						echo '<div class=\'publi\'>';
						echo $publication['pseudo_publi'];
						echo '<br>';
						echo '<img src="../image/'.$publication['image_publi'].'" height="50" width="50" alt="photo-profil">';
						echo '<br>';
						echo $publication['date_publication'];
						echo '<br>';
						echo '<br>';
						echo $publication['publication'];
						
						echo '</div>';
						echo'<br>';
						echo '<a href="./supprimer.php?page=profile&id='.$publication['id_publication'].'">Supprimer publication</a>';
						echo '<br>';
						echo '<br>';
						
						
						//afficher les publis
						
						echo '<a class="success"href="./repondre.php?page=profile&id='.$publication['id_publication'].'">Répondre</a>';
						echo '<br>';
						$lesEnreg=recup_rep($publication['id_publication']);
						//print_r($lesEnreg);
						$i = (count($lesEnreg)-1);
						
						if ($i == -1){
						
					}
							else{
								echo "<h4><u>Réponse:</u></h4>";
								while ($i >=0) {
								
								
								
								echo "<div class='rep'>";
								echo "<a href='./profilDesAutres.php?page=profile&pseudo=".$lesEnreg[$i]['pseudo_rep']."'>".$lesEnreg[$i]['pseudo_rep']." </a>";
								echo "<br>";
								echo '<img src="../image/'.$lesEnreg[$i]['image_rep'].'" height="50" width="50" alt="photo-profil">';
								echo "<br>";
								echo $lesEnreg[$i]['date_reponse'];
								echo "<br>";
								echo "<p>".$lesEnreg[$i]['reponse']."</p>";
								echo "<br>";
								echo '<a href="./supprimerRep.php?page=profile&id='.$publication['id_publication'].'">Supprimer la réponse</a>';
								echo "</div>";
								
								
								
								$i --;
								}
							}
						
					}
					break;
				}
			}
			
			
			
			
			
			
				
				
				
			
			
			?>
	


<br>
<br>




	</div>
	</body>
	</html>