<?php 
$nom="";
$article = [];
if(isset($_GET["nom"]))
{
 
  $nom = htmlentities($_GET["nom"]);
  
   
    $sql = "SELECT * FROM articles WHERE nom=:nom";
	$req = $db->prepare($sql);
	$req->execute(array(
	":nom"=>$nom
	));
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $article[] = $get;
	}
  
}
require "view/article.php";
?>