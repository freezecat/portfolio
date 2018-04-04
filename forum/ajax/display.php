<?php
require "../functions/vote3.php";
 $json = [];
if(isset($_POST["id"]))
{
$id = htmlentities($_POST["id"]);
$commentaire_id = commentaire_id($id);
//echo $id." ".$commentaire_id;
  //echo $id." ".likes($id)." ".$commentaire_id;
//echo "php:".$id;


 $json["id"] = $id;
 
 
 
  $json["likes"] = likes($id);
  $json["dislikes"] = dislikes($id);
  
}
echo json_encode($json);
?>