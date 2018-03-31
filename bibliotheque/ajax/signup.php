<?php 
require "../model/database.class.php";
require "../model/inscrits.class.php";
$inscrit = new Inscrits();
$pseudo ="";
$email = "";
$password = "";
$info = "";
if(isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"]))
{
  if(!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
  {
  
    
   

   if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
   $pseudo = htmlentities($_POST["pseudo"]);
   $email = htmlentities($_POST["email"]);
   $password = htmlentities($_POST["password"]);
  $inscrit->signup($db,$pseudo,$email,sha1($password));
  
  
  $info = $inscrit->getInfo();

  echo $info;
    }
	else
	{
	
	}
    }
  }
?>