<?php
//la fonction qui vérifie si tu es amis avec la personne et que donc tu puisses voir la publication

function verif_publi(){
	
		$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
		$tab = array('pseudoExp' => $pseudoUn);
	//	print_r($tab) ;
		$sql = " SELECT pseudo_exp,pseudo_dest FROM amis  WHERE active=1 AND (pseudo_exp = :pseudoExp OR pseudo_dest = :pseudoExp)";
	//	echo $sql;
		$res = $GLOBALS["bd"]->prepare($sql);
		$res->execute($tab) or die(print_r($res->errorInfo()));
		$lesEnreg= $res->fetchall();
		return $lesEnreg;
	
}
	
function nomSession(){
	
		$tab = array('id' => $_SESSION['id']);
//	print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	return $pseudoUn;
}

?>