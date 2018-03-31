<?php
$db = new PDO("mysql:host=localhost;dbname=portfolio_forum","root","");
function vote($pseudo,$likes,$dislikes,$commentaire_id)
{

global $db;
  
  $sql = "INSERT INTO votes(pseudo,likes,dislikes,commentaire_id) VALUES(:pseudo,:likes,:dislikes,:commentaire_id)";
  $req = $db->prepare($sql);
  $req->execute(array(
  ":pseudo"=>$pseudo,
  ":likes"=>$likes,
  ":dislikes"=>$dislikes,
  ":commentaire_id"=>$commentaire_id
  ));
  
}

function deja_vote($pseudo,$commentaire_id)
{
  global $db;
  $sql = "SELECT * FROM votes WHERE pseudo=:pseudo && commentaire_id =:commentaire_id";
 $req = $db->prepare($sql);
  $req->execute(array(
  ":pseudo"=>$pseudo,
  ":commentaire_id"=>$commentaire_id
  ));
  $count = $req->rowCount();
   return $count;
  }
 
 function likes($commentaire_id)
 {
   global $db;
  $sql = "SELECT * FROM votes WHERE likes=:likes && commentaire_id =:commentaire_id";
 $req = $db->prepare($sql);
  $req->execute(array(
  ":likes"=>1,
  ":commentaire_id"=>$commentaire_id
  ));
  $count = $req->rowCount();
   return $count;
 }
 
  function dislikes($commentaire_id)
 {
   global $db;
   //IL DOIT Y AVOIR UN ORDRE AVEC DATE ...!!
  $sql = "SELECT * FROM votes WHERE dislikes=:dislikes && commentaire_id =:commentaire_id";
 $req = $db->prepare($sql);
  $req->execute(array(
  ":dislikes"=>1,
  ":commentaire_id"=>$commentaire_id
  ));
  $count = $req->rowCount();
   return $count;
 }
 
 //recup commentaire_id à partir de id
 function commentaire_id($id)
 {
   global $db;
   $tab1 = [];
   $sql = "SELECT commentaire_id FROM votes WHERE id=:id";
	$req = $db->prepare($sql);
	$req->execute(array(
	 "id"=>$id
	));
	while($get = $req->fetch(PDO::FETCH_OBJ)){
	  return $get->commentaire_id;
	}

 }
 

?>