<?php
include("../Outils/Menu.php");
?>
			<h3>Vos invitations </h3>
			<?php
			include ("../Outils/fonctionInvitation.php");
			//print_r(recup_invitations());
			
			$invitations=recup_invitations();
			$invitations_accept=invitation_acceptee();
			//parcours le tableau (on peut ausi utiliser foreach)
					$i = (count($invitations))-1;
					if ($i == -1){
						echo "<div class='erreur'> Vous n'avez pas d'invitations </div>";
					}
					else{
					while ($i >=0) {
						if($invitations[$i]['active']==0){
						?>
						<image src="../image/<?php echo $invitations[$i]['image'];?>" height='100' width='100' alt='avatar'>
						<div class='erreur'>
						<?php echo $invitations[$i]['pseudo_exp'];?> a voulu vous ajouter comme ami(e)</br>
						<a href='./Accepter.php?page=profile&pseudo=<?php echo $invitations[$i]['pseudo_exp'];?>'>Accepter /</a><a href='./refuser.php?page=profile&pseudo=<?php echo $invitations[$i]['pseudo_exp'];?>'>  Refuser</a>
						</div>
						<?php
						$i --;
						}else{
							echo "<br><div class='sucess'>Vous êtes désormais ami(e)</div><br>";
							$i --;
						}
							
							
							
							
					}
				
			
				
					}
					$n = (count($invitations_accept))-1;
					
				if ($n != -1){
						?>
						<div class='success'><?php echo $invitations_accept [$n]['pseudo_dest'];?> a accepté votre invitation.</div>
						<br>
<br>

						<?php
						
						$n--;
					}
				
			?>
			
			</div>
	</body>
	</html>