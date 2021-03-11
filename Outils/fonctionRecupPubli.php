<?php
//récupérer les infos et la publications dans la base de donnée

function recup_publication(){
	
	$tab = array( );
	//print_r($tab) ;
	$sql = " SELECT id_publication,publication,date_publication,pseudo_publi,image_publi
	FROM publication
	
	
	ORDER BY date_publication DESC";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
		return $lesEnreg;
	
}


?>