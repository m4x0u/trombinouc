<?php
//fonction qui va enregistré dans la base de donnée la publication

function ecrire(){
			$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	$imagePubli=$info_pseudo[0]['image'];
	
	$tab = array(':pseudo_publi' => $pseudoUn, 'publication'=>$_POST['publication'] , 'image_publi'=>$imagePubli);
	//print_r($tab) ;
	$sql = "INSERT INTO publication (id_publication,publication,date_publication, pseudo_publi,image_publi,reponse,date_reponse,pseudo_rep) VALUES  ('',:publication,NOW(),:pseudo_publi,:image_publi,'','','')";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	
	header("Location:./publication.php");
}


?>