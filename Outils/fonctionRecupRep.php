<?php
//fonction qui récupére les réponses
function recup_rep($id){
	$tab = array( 'id'=> $id);
	//print_r($tab) ;
	$sql = " SELECT *
	FROM reponse
	
	WHERE id_publi= :id
	ORDER BY date_reponse DESC";
//	echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
		return $lesEnreg;
	
	
}


?>