<?php 
//$])Cc
$titre = "";

$pseudo = "";
$info = "";

$date = date("Y-m-d H:i:s");
$start = strtotime($date);
$end ="";
$duration = "";
$jours = "";
if(isset($_GET["titre"]))
{
$titre = htmlentities($_GET["titre"]);
$book = $livre->titre($db,$titre);
   
   if(isset($_POST["duree"]))
   {
     $jours = $_POST["duree"];
	
	 $duration = $jours*3600*24;

	 $end= $start + $duration ;
	
	 
	 if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
	 {
	 $pseudo = htmlentities($_SESSION["pseudo"]);
	
	$livre->emprunt($db,$titre,$pseudo,$start,$end);
    echo $livre->getInfo();
	
	  
	 }
	 else
	 {
	    $info = "Pour emprunter il faut vous identifier!";
	 }
	 
   }
   
   $emprunt = $livre->date_echeance($db,$titre);
	

	
	 
	
	
	
}


 
 //$livre->back($db,$start);
 //pour le retour voir livre->retour! mis dans index.php et voir livres.php au meme niv que index.php
 
require "view/emprunt.php";
?>