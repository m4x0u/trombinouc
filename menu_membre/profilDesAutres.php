<?php
include("../Outils/Menu.php");
?>
			
			
			<div class='info'>
			<?php
			
			include ("../Outils/fonctionProfilsAutres.php");
			$expe=verif_exp();
			echo "</br></br></br>";
			//print_r($expe);
			
			$verif=demande_existe();
			$accepte=accepter_demande();
			//verifie dans quel cas on est pour pouvoir afficher le profil ou non
			if($verif[0][0]==0){
				 echo "<div class='erreur'>Vous n'êtes pas ami(e) avec cette personne </div>";?>
				 <a href='./envoiInvit.php?page=profile&pseudo=<?php echo $_GET['pseudo'];?>'>Envoyer une invitation</a> 
				 
		<?php	 }
					else if($accepte[0]['active']==0 && $expe[0][0]==1){
			?>
			<div class='sucess'> La demande a été envoyé</br> <a href='./annuler.php?page=profile&pseudo=<?php echo $_GET['pseudo'];?>'>Annuler la demande</a></div>
		<?php }	
					
					else if($accepte[0]['active']==0 && $expe[0][0]!= 1) {
			
			echo "<div class='success'>Demande en cours!!!!</br> Vérifier vos invitations</div>";
				
					}
		else{
			
			
			
			
				$lesEnreg= infos_membre_choisi();
				$i = (count($lesEnreg))-1;
				if ($i == -1){
					
					echo"<div class='erreur'> Vous êtes le seul membre pour l'instant.</div>";
					
				}
				else{
					while ($i >=0) {
						?>
						<?php if( $lesEnreg[0]['sexe'] == "Homme"){?>
							<h3> Vous avez choisis le fameux <u> <?php echo $_GET['pseudo'];?> </u></h3>
							<?php } else { ?>
								<h3> Vous avez choisis la fameuse <u> <?php echo $_GET['pseudo'];?> </u></h3>
							<?php }?>
						
						
						
						
						<p><strong>Email</strong> :<em><?php echo $lesEnreg[0]['email'];?></em></p>
						<a href="./changerInfos.php"><img src="../image/<?php echo $lesEnreg [0]['image']; ?>" height='150' width='150' alt='photo-profil'> </a>
						<p><?php echo $lesEnreg[0]['description'];?></p>
						<br>
						
						<a href="mailto:<?php echo $lesEnreg[0]['email'] ;?>">Lui envoyer un mail ? </a>
						</br>
						<br>
						<a class='erreur' href='./supAmis.php?page=profile&pseudo=<?php echo $_GET['pseudo'];?>'>Retirer de tes amis</a>
						
						
						<?php
						$i--;
					}
				}
			}
		
			
			?>
			<br><br><br>
			</div>
		</div>
	</body>
	</html>