<?php
//fonction qui récupère le pseudo et l'image de des membres

function recup_pseudo_image(){
	
	$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT pseudo,image FROM utilisateurs WHERE id != :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
	
	return $lesEnreg;
}


?>