<?php 
$article = [];

$_SESSION["total"] = "";
$prix_total = intval(0);
foreach($_SESSION["panier"] as $index=>$value)
	{
	
	     $sql = "SELECT * FROM articles WHERE id=:id";
	   $req = $db->prepare($sql);
	   $req->execute(array(
	   ":id"=>$index
	   ));
	   
	   while($get = $req->fetch(PDO::FETCH_OBJ))
	   {
	    
		 $article[]= $get;
		 
		 
		   //echo $_SESSION["panier"][$get->id]*$get->prix."<br/>";
		   $prix_total += $_SESSION["panier"][$get->id]*$get->prix;
		 	     
	   }
	}

	echo sizeof($_SESSION["panier"])."<br/>";
	$_SESSION["total"]= intval($prix_total);
	

echo var_dump($_SESSION["panier"]);
require "view/achat.php";
?>