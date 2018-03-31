<?php 
$db = new PDO("mysql:host=localhost;dbname=portfolio_forum","root","");

function membre_letter($letter)
{
	global $db;
	$tab =[];
	 
	$sql ="SELECT pseudo,date,avatar FROM membres WHERE pseudo LIKE :letter";
	$req = $db->prepare($sql);
	$req->execute(array(
	":letter"=>$letter."%"
	));


	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $tab[] = $get;
	}
	 return $tab;
}

function membre_date()
{
  global $db;
	$tab =[];
	 
	$sql ="SELECT pseudo,date,avatar FROM membres";
	$req = $db->prepare($sql);
	$req->execute();


	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $tab[] = $get;
	}
	 return $tab;
}

?>