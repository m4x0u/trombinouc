<?php
//fonction qui va récuperer les invitations
function recup_invitations(){
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
		return $lesEnreg;
	
}
//fonction qui va permettre d'afficher à l'utilisateur si ca demande à été acceptée
function invitation_acceptee(){
	$tab = array('id' => $_SESSION['id']);
//	print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
		$tab = array('pseudoExp' => $pseudoUn );
//	print_r($tab) ;
	$sql = "SELECT pseudo_dest FROM amis WHERE pseudo_exp = :pseudoExp AND active = 1 ";
//	echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
		return $lesEnreg;
}
?>