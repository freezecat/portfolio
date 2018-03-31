<?php
session_start();
//header("Content-type:application/json");
require "../functions/vote.php";
$commentaire_id = "";

$vote = "";
$likes="";
$dislikes="";
$pseudo="";
$json =[];


if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
{
   $pseudo = htmlentities($_SESSION["pseudo"]);
     
	if(isset($_POST["id"]) && isset($_POST["vote"]))
	{
	$id = htmlentities($_POST["id"]);
	$vote = htmlentities($_POST["vote"]);
	
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
	 $json["info"] = "Vous avez deja vote !";
	}
	else
	{
	  vote($pseudo,$likes,$dislikes,$id);
	  $json["info"]= "Merci d'avoir vote";
	  }
	   
   //echo $pseudo." ".$id." ".$vote;
      $json["id"]= $id;
	 
	   $commentaire_id = commentaire_id($id);
	   $json["commentaire_id"] = $commentaire_id;
      $json["likes"]= likes($commentaire_id);
   $json["dislikes"]=dislikes($commentaire_id);
   }
}
else
{
  $json["info"] = "Vous devez vous identifier avant de voter !";
}
echo json_encode($json);


 ?>