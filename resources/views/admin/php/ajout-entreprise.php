<?php

include "../connexion.php";

$n=10; 
function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

  
$msg = "";


   
   
//2- Récuperation des variables
$rsociale =mysqli_real_escape_string($conn,$_POST['rsociale']);
$adresse =mysqli_real_escape_string($conn,$_POST['adresse']);
$ville =mysqli_real_escape_string($conn,$_POST['ville']);
$tel =mysqli_real_escape_string($conn,$_POST['tel']);
$email =mysqli_real_escape_string($conn,$_POST['email']);
$secteur =mysqli_real_escape_string($conn,$_POST['secteur']);
$description =mysqli_real_escape_string($conn,$_POST['description']);

//$file_name =mysqli_real_escape_string($conn,$_FILES['logo']['name']);

if(isset($_FILES['logo'])){
    $errors= array();
    $file_name = $_FILES['logo']['name'];
    $file_size =$_FILES['logo']['size'];
    $file_tmp =$_FILES['logo']['tmp_name'];
    $file_type=$_FILES['logo']['type'];
    $exp = explode('.',$_FILES['logo']['name']);
    $end_expl = end($exp);
    $file_ext=strtolower($end_expl);
    
    $expensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    $logo = getName($n).'_'.$file_name;
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"../uploads/".$logo);
       //echo "Success";
    }else{
       print_r($errors);
    }
    //3- Préparation de la requete
$req = "INSERT INTO `entreprises`(`rsociale`, `adresse`, `ville`, `tel`, `email`, `secteur`, `description`, `logo`) VALUES ('".$rsociale."','".$adresse."','".$ville."','".$tel."','".$email."',".$secteur.",'".$description."','".$logo."')";
 } else{
     //3- Préparation de la requete
$req = "INSERT INTO `entreprises`(`rsociale`, `adresse`, `ville`, `tel`, `email`, `secteur`, `description`) VALUES ('".$rsociale."','".$adresse."','".$ville."','".$tel."','".$email."',".$secteur.",'".$description."')";
 }


//echo $req;

//4- Execution de la requete
$exec = mysqli_query($conn,$req);
if($exec){
	$msg ="<span style='color:green;'>Votre entreprise a été ajouté.</span>";
}else{
	$msg ="<span style='color:red;'>Entreprise non ajouté !!!!</span>";
}



?>