<?php

function createUser()
{
		$tab = array('pseudo' => $_POST['newpseudo'], 'password' => sha1($_POST['newpasswd']),'email' => $_POST['email'],'sexe' => $_POST['sexe'],'description' => $_POST['description']);
	//print_r($tab) ;
	$sql = " INSERT INTO utilisateurs (pseudo, password,email,sexe,description,image) VALUES(:pseudo,:password,:email,:sexe,:description,'avatar_défaut.jpg') ";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
}


function verification()
{
		$tab = array('pseudo' => $_POST['pseudo'], 'password' => sha1($_POST['passwd']));
	//print_r($tab) ;
	$sql = " SELECT pseudo,password,id FROM utilisateurs WHERE pseudo= :pseudo AND password= :password";
	//echo $sql;
	$res = $GLOBALS["bd"]->prepare($sql);
	$res->execute($tab) or die(print_r($res->errorInfo()));
	$lesEnreg= $res->fetchall();

	

	echo'<br>';
	//print_r ($lesEnreg);
	echo'<br>';
	echo'<br>';
	
	if(count($lesEnreg)==0){
		
	echo '<a href="./index.php">pseudo ou mots de passe incorrecte </a>';
	}
	else{
			if ( $lesEnreg[0]['pseudo'] == $_POST['pseudo'] AND $lesEnreg[0]['password'] == sha1($_POST['passwd'])){
				$_SESSION['id']=$lesEnreg[0]['id'];
				echo $_SESSION['id'];
				header ("Location:./menu_membre/membre.php");
				exit();
			}
			else{
				echo '<a href="./index.php">pseudo ou mots de passe incorrecte </a>';
			}
		}
	}
?>