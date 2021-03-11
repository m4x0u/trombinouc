<?php
//fonction qui va envoyer l'invitation dans la Bdd
function enreg_invit(){
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
	$sql = " INSERT INTO amis(id_invitation,pseudo_exp,pseudo_dest, date_invitation,date_confirmation,active) VALUES  ('',:pseudoExp,:pseudoDest,NOW(),'',0)";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	
	
}


?>