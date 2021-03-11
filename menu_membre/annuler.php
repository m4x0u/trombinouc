<?php
session_start();
	include("../Outils/connexionBdD.php");
	
		if(empty($_SESSION['id'])){
			header("Location:../index.php");
			exit();
				}

include ("../Outils/fonctionAnnuler.php");
sup_invit();
header("Location:./profilDesAutres.php?page=profile&pseudo=". $_GET['pseudo']);


?>