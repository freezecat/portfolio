<?php 
//$])Cc
require "../functions/vote.php";
$json= [];
if(isset($_POST["id"]))
{
// je clique ,je releve le id et recup son commentaire_id associe, puis je cherche son nbre de likes et dislikes
  //echo "serveur:".$_POST["id"];
  
 // $i = htmlentities($_POST["i"]);
  $id = htmlentities($_POST["id"]);

  $commentaire_id = commentaire_id($id);
 
 //$json["i"] = $i;
  $json["id"] = $id;
  $json["commentaire_id"] = $commentaire_id;
 
  $json["likes"] = likes($commentaire_id);
  $json["dislikes"] = dislikes($commentaire_id);
}
echo json_encode($json);
?>