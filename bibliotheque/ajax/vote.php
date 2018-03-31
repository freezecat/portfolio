<?php 
session_start();
require "../model/database.class.php";
require "../model/vote.class.php";
$v = new Vote();
$pseudo = "";
$vote = "";
$titre= "";
if(isset($_POST["vote"]) && isset($_POST["titre"]) && isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
{
  $vote  =htmlentities($_POST["vote"]);
  $titre  =htmlentities($_POST["titre"]);
  $pseudo = htmlentities($_SESSION["pseudo"]);
 // echo 	"PHP: ".$vote." ".$titre;
  echo $v->like_dislike($db,$titre,$pseudo,$vote);
}
else
{
  echo "Pour pouvoir voter ,identifiez-vous";
}


?>