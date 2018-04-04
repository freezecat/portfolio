<?php
session_start();
//header("Content-type:application/json");
require "../functions/vote3.php";
$commentaire_id = "";

$vote = "";
$likes="";
$dislikes="";
$pseudo="";

if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
{
$pseudo = htmlentities($_SESSION["pseudo"]);
     
	if(isset($_POST["id"]) && isset($_POST["vote"]))
	{
	$id = htmlentities($_POST["id"]);
	$vote = htmlentities($_POST["vote"]);
	 
	// echo $id." ".$vote;
	  if($vote == "likes")
	   {
	    $likes = 1;
		$dislikes = 0;
	   }
	   if($vote == "dislikes")
	   {
	    $likes = 0;
		$dislikes = 1;
	   }
	  
	       if(deja_vote($pseudo,$id)>0)
	{
	 echo "Vous avez deja vote !";
	 
	}
	else
	{
	  vote($pseudo,$likes,$dislikes,$id);
	  echo "Merci d'avoir vote";

	  }
	}

}
else
{
  echo "Vous devez vous identifier avant de voter !";
}

 ?>