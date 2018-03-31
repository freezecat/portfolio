<?php 
require "model/Panier.class.php";
$panier = new Panier();

$session = new Panier();
require "bdd.php";

$page = "";
if(array_key_exists('page',$_GET))
{
   

	 
	 
   
  if(ctype_alpha($_GET["page"]))
  {
   
    
	
	$page = htmlentities($_GET["page"]);
  
     
  }
  else
  {
    $page = "error";
  }
}
else
{
   $page = "home";
}
require "layout.php";
?>