<?php
session_start();
	include("../Outils/connexionBdD.php");
	
		if(empty($_SESSION['id'])){
			header("Location:../index.php");
			exit();
				}

include ("../Outils/fonctionEnvoiInvit.php");
enreg_invit();
$invit="Location:./profilDesAutres.php?page=profile&pseudo=". $_GET['pseudo'];
header($invit);

?>
			