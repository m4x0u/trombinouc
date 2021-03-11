<?php
//la function qui va récupérer la liste d'amie expéditeur
function liste_amis_exp(){
		$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
		$tab = array('pseudoExp' => $pseudoUn);
		//print_r($tab) ;
		$sql = " SELECT pseudo_dest,image FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_dest WHERE pseudo_exp = :pseudoExp AND active=1";
	//	echo $sql;
		$res = $GLOBALS["bd"]->prepare($sql);
		$res->execute($tab) or die(print_r($res->errorInfo()));
		$lesEnreg= $res->fetchall();
		return $lesEnreg;
	
}
//la function qui va récupérer la liste d'amie destinataire
function liste_amis_dest(){
		$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
		$tab = array('pseudoExp' => $pseudoUn);
		//print_r($tab) ;
		$sql = " SELECT pseudo_exp,image FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp WHERE pseudo_dest = :pseudoExp AND active=1";
		//echo $sql;
		$res = $GLOBALS["bd"]->prepare($sql);
		$res->execute($tab) or die(print_r($res->errorInfo()));
		$lesEnreg= $res->fetchall();
		return $lesEnreg;
	
}





?>