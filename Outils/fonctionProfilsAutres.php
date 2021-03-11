<?php
//la fonction qui va récupérer les infos des autres profils pour la liste des membres choisis
function infos_membre_choisi(){
	$tab = array('pseudo' => $_GET['pseudo']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE pseudo = :pseudo";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();
	
	return $lesEnreg;
}
//fonction vérif de demande
function demande_existe(){
	
	$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
	
	
	
	
	
	$tabl = array('pseudoUn' => $pseudoUn,'pseudoDeux'=> $_GET['pseudo']);
	//print_r($tabl) ;
	$sql = " SELECT COUNT(id_invitation) FROM amis WHERE ( pseudo_exp = :pseudoUn AND pseudo_dest= :pseudoDeux )OR ( pseudo_exp = :pseudoDeux AND pseudo_dest= :pseudoUn )";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tabl) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();

	return $lesEnreg;
	
}
//la fonction qui va vérifier si le destinataire à accepter la demande
	function accepter_demande(){
		$tab = array('id' => $_SESSION['id']);
	//print_r($tab) ;
	$sql = " SELECT * FROM utilisateurs WHERE id = :id";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$info_pseudo= $res->fetchall();
	
	$pseudoUn= $info_pseudo[0]['pseudo'];
	
	
	
	
		$tab = array('pseudoExp' => $pseudoUn,'pseudoDest'=>$_GET['pseudo']);
	//	print_r($tab) ;
		$sql = " SELECT active FROM amis WHERE (pseudo_exp = :pseudoExp AND pseudo_dest=:pseudoDest) OR ( pseudo_exp = :pseudoDest AND pseudo_dest=:pseudoExp)";
	//	echo $sql;
		$res = $GLOBALS["bd"]->prepare($sql);
		$res->execute($tab) or die(print_r($res->errorInfo()));
		$lesEnreg= $res->fetchall();
		//print_r($lesEnreg);
		return $lesEnreg;
		/*if($lesEnreg[0]['active']==0 or  $lesEnreg[1]['active']==0)
		{
			return false;
		}else{
			
		return true;
		}*/
	
	}
	
	//fonction qui va vérifier si celui qui aura "demande envoyé" est l'expéditeur
	function verif_exp(){
		$tab = array('id' => $_SESSION['id']);
		//print_r($tab) ;
		$sql = " SELECT * FROM utilisateurs WHERE id = :id";
		//echo $sql;
		$res = $GLOBALS["bd"]->prepare($sql);
		$res->execute($tab) or die(print_r($res->errorInfo()));
		$info_pseudo= $res->fetchall();
		
		$pseudoSession= $info_pseudo[0]['pseudo'];
		
		
		
		
		$tab = array('pseudoExp' => $pseudoSession,'pseudoDest'=>$_GET['pseudo']);
	//	print_r($tab) ;
		$sql = " SELECT COUNT(id_invitation) FROM amis WHERE ( pseudo_exp = :pseudoExp AND pseudo_dest= :pseudoDest ) ";
		//echo $sql;
		$res = $GLOBALS["bd"]->prepare($sql);
		$res->execute($tab) or die(print_r($res->errorInfo()));
		$lesEnreg= $res->fetchall();
		return $lesEnreg;
		
	}
	
	
	
	



?>