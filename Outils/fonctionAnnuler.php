<?php
//fonction qui va supprimer l'invitation si refusé
function sup_invit(){
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
	$sql = " DELETE FROM amis WHERE pseudo_exp=:pseudoExp AND pseudo_dest=:pseudoDest";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	
}
?>