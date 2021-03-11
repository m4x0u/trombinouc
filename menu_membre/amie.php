<?php
include("../Outils/Menu.php");
?>

<h3> Vos amis : </h3>
<?php
include("../Outils/fonctionAmie.php");

$liste_amis_exp=liste_amis_exp();
$liste_amis_dest=liste_amis_dest();

//print_r($liste_amis_exp);

//print_r($liste_amis_dest);

$i = (count($liste_amis_exp))-1;
$istock=$i;
//il va servir de compteur pour parcourir le tableau on aurait pu utiliser aussi le foreach mais je suis plus à l'aise avec cette notion, cependant pour divercier mon code j'utilise le foreach dans d'autres pasges
					if ($i == -1){
						
					}
					else{
						while ($i >=0) {
						
						?>
						<p><a href='./profilDesAutres.php?page=profile&pseudo=<?php echo $liste_amis_exp[$i]['pseudo_dest']; ?>'><?php echo $liste_amis_exp[$i]['pseudo_dest'];?> <br>



						<image src="../image/<?php echo $liste_amis_exp[$i]['image'];?>" height='100' width='100' alt='avatar'>
						<br><br><br>
						<?php
						
						
						
									

						$i --;
						}
					}
					
					
					
$n = (count($liste_amis_dest))-1;
$nstock=$n;
					if ($n == -1){
						
					}
					else{
						while ($n >=0) {
						
						?>
						<p><a href='./profilDesAutres.php?page=profile&pseudo=<?php echo $liste_amis_dest[$n]['pseudo_exp']; ?>'><?php echo $liste_amis_dest[$n]['pseudo_exp'];?> <br>



						<image src="../image/<?php echo $liste_amis_dest[$n]['image'];?>" height='100' width='100' alt='avatar'>
						<br><br><br>
						<?php
						$n --;
						}
					}	

					if ( $nstock == -1 && $istock == -1 ){
						echo "<div class='erreur'> Vous n'avez pas d'ami.</div>";
					}
?>

<br>
<br>
<br>

	</div>
	</body>
	</html>