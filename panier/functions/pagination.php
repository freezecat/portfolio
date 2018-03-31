<?php
$p=1;
function nbr_page($table,$nbr_par_page)
{
global $db;

$sql = "SELECT * FROM ".$table;
$req = $db->query($sql);
$req->execute();
$count = $req->rowCount();

//echo $count;

$p = 1;
$nbr_par_page;
$nbr_page =  ceil($count/$nbr_par_page);
return $nbr_page;
}

function pagination($table,$nbr_par_page)
{
global $db;
$articles = [];


$sql = "SELECT * FROM ".$table;
$req = $db->query($sql);
$req->execute();
$count = $req->rowCount();

//echo $count;

$p = 1;
$nbr_par_page;
$nbr_page =  ceil($count/$nbr_par_page);

 
   
//echo $nbr_page;

if(isset($_GET["p"]))
{
   $p = htmlentities($_GET["p"]);
   $p = intval($p);
   $pagination ="page_selected";
}
  else
  {
$p = 1;
  }
  $min = $nbr_par_page*($p-1)+1;
   $max = $nbr_par_page*$p;
  
   
	$sql1 = "SELECT * FROM articles WHERE id BETWEEN :min and :max";
	$req1 = $db->prepare($sql1);
	$req1->execute(
	array(
	":min"=>$min,
	":max"=>$max
	)
	);
	while($get1 = $req1->fetch(PDO::FETCH_OBJ))
	{
	   $articles[] = $get1; 
	}
 return $articles;
}
 ?>