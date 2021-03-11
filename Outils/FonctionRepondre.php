<?php
//fonction qui va enregistré dans la base de donnée la réponse

function repondre(){
			$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
//	echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	$imagePubli=$info_pseudo[0]['image'];
	
	$tab = array(':pseudo_rep' => $pseudoUn, 'reponse'=>$_POST['reponse'] , 'image_rep'=>$imagePubli,'id'=>$_GET['id']);
//	print_r($tab) ;
	$sql = "INSERT INTO reponse (id_reponse,pseudo_rep,reponse,date_reponse,image_rep,id_publi) VALUES  ('',:pseudo_rep,:reponse,NOW(),:image_rep,:id)";
//	echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	
	header("Location:./publication.php");

}


?>