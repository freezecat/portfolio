<?php 
//$cC])
$sql = "SELECT MAX(id) FROM articles";
$req = $db->query($sql);
$req->execute();
$max = $req->fetch(PDO::FETCH_ASSOC);
$idmax = $max["MAX(id)"];


$sql1 = "SELECT * FROM articles WHERE id=:id";
$req1 = $db->prepare($sql1);
$req1->execute(array(
":id"=>$idmax
));
$new = $req1->fetch(PDO::FETCH_OBJ);
$nom  = $new->nom;
$description = $new->description;
$prix = $new->prix;
$image = $new->image;
//echo $nom." ".$description." ".$prix." ".$image;
require "view/newarticle.php";
?>