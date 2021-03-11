<?php

//fonction qui récupére infos du membre

function infos_membre(){
	$tab = array('id' => $_SESSION['id']);
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
	
	return $lesEnreg;
}

// fonction pour le nombre de membre
function nombre_membre(){
	$tab = array('id' => $_SESSION['id']);
	$sql = " SELECT COUNT(:id) FROM utilisateurs ";
	
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
	//print_r ($lesEnreg);
	return $lesEnreg;
	
}

//fonction qui compte le nombre d'invitation
function nb_invitation(){
	$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
	
	$tab = array('pseudoDest' => $pseudoUn );
	//print_r($tab) ;
	$sql = " SELECT pseudo_exp,date_invitation,active,image 
	FROM amis
	INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp 
	WHERE pseudo_dest= :pseudoDest 
	ORDER BY date_invitation DESC";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
		$i = (count($lesEnreg));
		 return $i;
	
}
?>