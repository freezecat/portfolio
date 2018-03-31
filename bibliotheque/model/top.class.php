<?php
//$])Cc
class Top
{
  public function liste($db)
  {
    $t = [];
    $sql = "SELECT COUNT(*) as m,livre_id FROM vote WHERE likes=:likes GROUP BY livre_id ORDER BY COUNT(*) DESC";
	$req = $db->prepare($sql);
	$req->execute(
	array(":likes"=>1)
	);
	
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $t[] = $get;
	}
	return $t;
	
  }
  
  public function display($db,$livre_id)
  {
    $t =[];
	$sql = "SELECT titre,url FROM livres WHERE id=:id";
	$req = $db->prepare($sql);
	$req->execute(array(
	":id"=>$livre_id
	));
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $t[] = $get;
	}
	return $t;
  }
}
 ?>