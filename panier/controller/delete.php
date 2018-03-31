
<?php
//$])Cc faire une pagination!

require "functions/pagination.php";

$nbr_page = nbr_page("articles",5);
$articles = pagination("articles",5);
$msg = "";
$id = "";
if(isset($_GET["id"]))
{
 $id = htmlentities($_GET["id"]);
 $id = intval($id);
 
  $sql = "DELETE FROM articles WHERE id=:id";
  $req = $db->prepare($sql);
  $req->execute(array(
  ":id"=>$id
  ));
  
  $sql1 = "SELECT id FROM articles WHERE id>:id";
    $req1 = $db->prepare($sql1);
  $req1->execute(array(
  ":id"=>$id
  ));
  $max = $req1->rowCount();
  
  while($get =$req1->fetch(PDO::FETCH_OBJ))
  {
   // echo $get->id."<br/>";
	
	//decremente tous les id superieurs à $_GET["id"]
	$updated_id = htmlentities($get->id-1);
	$updated_id = intval($updated_id);
	 $sql1 = "UPDATE articles set id=:updated_id WHERE id>:id";
    $req1 = $db->prepare($sql1);
    $req1->execute(array(
	":updated_id"=>$updated_id,
     ":id"=>$id
  ));
  
    //autoincrement;
	
	$max = htmlentities($max);
	$max = intval($max);
	 $sql2 = "ALTER TABLE articles AUTO_INCREMENT=".$max;
    $req2 = $db->prepare($sql2);
    $req2->execute();
	
	$msg ="Article supprimée!";
//remove image.extension du dossier images/
  }
}


require "view/delete.php";
 ?>