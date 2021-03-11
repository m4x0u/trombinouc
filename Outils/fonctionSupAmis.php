<?php
//fonction qui va supprimer un ami
function supprimer_amis(){
	
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
	$sql = " DELETE FROM amis WHERE (pseudo_exp=:pseudoExp AND pseudo_dest=:pseudoDest) OR (pseudo_exp=:pseudoDest AND pseudo_dest=:pseudoExp)";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
}


?>