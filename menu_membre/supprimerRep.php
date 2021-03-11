<?php
session_start();
	include("../Outils/connexionBdD.php");
	
		if(empty($_SESSION['id'])){
			header("Location:../index.php");
			exit();
				}
//la fonction qui va supprimer la rep
function supprimer(){
	$tab = array('id' => $_GET['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
	$tab = array('id' => $_GET['id'] );
//	print_r($tab) ;
	$sql = " DELETE FROM reponse WHERE id_publi=:id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
}

supprimer();
header("Location:./publication.php");


?>