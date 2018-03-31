<?php 
//$])Cc
$email = "";
$password = "";
$msg= "";
$_SESSION["pseudo"] = "";
 $_SESSION["argent"]="";
  $_SESSION["statut"]="";

if(isset($_POST["email"],$_POST["password"]))
{
  if(!empty($_POST["email"]) && !empty($_POST["password"]))
  {
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
	
	$sql = "SELECT * FROM membres WHERE email=:email and password=:password";
	$req = $db->prepare($sql);
	$req->execute(array(
	":email"=>$email,
	":password"=>sha1($password)
	));
	
	  
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	   
	     
		 if($email == $get->email && sha1($password) == $get->password)
		 {
		   $_SESSION["pseudo"] = htmlentities($get->pseudo);
		    $_SESSION["statut"] = htmlentities($get->statut);
		   $_SESSION["argent"] = htmlentities($get->argent);
		   header("Location:index.php");
		 }
		
	}
  }
  else
  {
  $msg = "Remplissez les cases";
    echo $msg ;
  }
}
require "view/login.php";

?>