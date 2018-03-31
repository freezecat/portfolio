<?php

require "../model/database.class.php";
require "../model/livre.class.php";
$livre = new Livre();
$search  ="";
$json=[];
if(isset($_POST["search"]) && !empty($_POST["search"]))
{
  $search = htmlentities($_POST["search"]);
  
  
	$json = $livre->search($db,$search);
}
echo json_encode($json);
?>