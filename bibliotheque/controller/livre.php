<?php
//$])Cc
$titre = "";
$autres = "";
$commentaires = "";
$com = "";
$pseudo = "";
$info = "";
$ide = "";

$likes = "";
$dislikes = "";
$total = "";

$info = "";
if(isset($_GET["titre"]))
{
$titre = htmlentities($_GET["titre"]);


$book = $livre->titre($db,$titre);


if($book!=false)
{
$autres = $livre->autres_livres($db,$titre);
}
else
{
 $info= "Le livre que vous cherchez est introuvable!";
}


$total = $vote->total($db,$titre)->total;

  
  if($total !=0)
  {
  $likes = $vote->likes($db,$titre)->thumb_up;
  $dislikes= $total- $likes;
  $l = ($likes/$total)*100;
        $d = ($dislikes/$total)*100;
		
   }
   
   

   if(isset($_POST["commentaire"]) && !empty($_POST["commentaire"]))
   {
       $com = htmlentities($_POST["commentaire"]);
	   if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
	   {
	     $pseudo = htmlentities($_SESSION["pseudo"]);
		 
		 $info = "commentaire poste!";
		
		 $livre->post($db,$titre,$pseudo,$com);
	   }
	   else
	   {
	     $info  ="Identifiez-vous pour pouvoir poster un commentaire";
	   }
	   
   }
    
   //vote
   
   
}
require "view/livre.php";
 ?>