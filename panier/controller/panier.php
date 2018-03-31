<?php
$id = "";
$article = [];

$qte = "";
    if(isset($_GET["id"]))
	{
	   $id = htmlentities($_GET["id"]);
	   
	   
	   $panier->add($id);
	  
	}

	
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
		 	     
	   }
	}
	

	
    
	
	require "view/panier.php";
 ?>