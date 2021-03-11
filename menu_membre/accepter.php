<?php
session_start();
	include("../Outils/connexionBdD.php");
	
		if(empty($_SESSION['id'])){
			header("Location:../index.php");
			exit();
				}
//la fonction qui accepte l'invitation
function accepter_invit(){
	$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
	$tab = array('pseudoExp' => $pseudoUn, 'pseudoDest'=>$_GET['pseudo'] );
	//print_r($tab) ;
	$sql = " UPDATE amis SET active=1,date_confirmation=NOW()
	WHERE pseudo_exp= :pseudoDest AND pseudo_dest= :pseudoExp";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
}

accepter_invit();
header("Location:./profilDesAutres.php?page=profile&pseudo=". $_GET['pseudo']);


?>