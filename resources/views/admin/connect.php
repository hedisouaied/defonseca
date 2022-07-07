<?php
include 'connexion.php';
// 1- recuperation
$pseudo = $_POST['login'];
$pass = $_POST['motdepasse'];

// 3- Préparation
$row = "SELECT * FROM `users` where ss='".$pseudo."' and pp='".$pass."' ";

// 4- Exécution
$exect = mysqli_query($conn,$row);

// 5- verification
$result = mysqli_num_rows($exect);

if($result == 0){
	echo "merci de vérifier votre pseudo ou mot de passe";
	header("location:index.php?error");
}else{
	
	echo "vous êtes connecté";
	$_SESSION['auth']=true;
	
	
	header("location:dashboard.php");
	
}
?>