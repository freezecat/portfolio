<?php 
header("Content-type:application/json");
require "../bdd.php";
$json = [];
$s = "";

 if(isset($_POST["search"]) && !empty($_POST["search"]))
 {
//echo "server => ".$_POST["search"];
   $s = htmlentities($_POST["search"]);
   
 
		$sql = "SELECT * FROM articles WHERE nom LIKE :s";
	   $req = $db->prepare($sql);
	   $req->execute(array(
	   ":s"=> $s."%"
	   ));
	   
	   while($get = $req->fetch(PDO::FETCH_OBJ))
	   {
		
		 $json[] = $get;
	   }
   
}

   echo json_encode($json);
?>