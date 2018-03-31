<?php 
session_start();
require "../model/database.class.php";
require "../model/inscrits.class.php";
$inscrit = new Inscrits();
$email = "";
$password = "";
$info = "";
$_SESSION["pseudo"] = "";

if(isset($_POST["email"]) && isset($_POST["password"]))
{
  
   $email = htmlentities($_POST["email"]);
   $password = htmlentities($_POST["password"]);

  $login = $inscrit->login($db,$email,sha1($password));
  
  
  //$info = $inscrit->getInfo();
 
   
    //echo var_dump($login);
	foreach($login as $l)
	{
	if($email == $l->email && sha1($password) == $l->password)
	{
	  //echo "okay";
	  $_SESSION["pseudo"] = $l->pseudo;
	  
	  
	}
	
	}
  
  }
?>