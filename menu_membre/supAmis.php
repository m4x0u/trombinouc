<?php
session_start();
	include("../Outils/connexionBdD.php");
	
		if(empty($_SESSION['id'])){
			header("Location:../index.php");
			exit();
		}
		
		include("../Outils/fonctionSupAmis.php");
		supprimer_amis();
header("Location:./amie.php");