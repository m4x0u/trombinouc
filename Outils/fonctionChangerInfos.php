<?php
//fonction qui va mettre à jour les infos
function changer_infos(){
	$tab = array('pseudo' => $_POST['pseudo'], 'email' => $_POST['email'],'description' => $_POST['description']);
	//print_r($tab) ;
	$sql = " UPDATE utilisateurs SET pseudo=:pseudo, email= :email, description=:description WHERE id='{$_SESSION['id']}'";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	echo'<br>';
	echo'<br>';
	$res->execute($tab) or die(print_r($res->errorInfo()));
	
	
	
	
	
}


?>