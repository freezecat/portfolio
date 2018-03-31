<?php


spl_autoload_register(function($class){
   require "../model/".$class.".class.php";
});


$database = new Database("localhost","portfolio_bibliotheque","root","");
$db = $database->getDatabase();

$livre = new Livre();
$id = "";
$titre = "";
$json = [];
if(isset($_POST["id"]) && isset($_POST["titre"]))
{
  $id = htmlentities($_POST["id"]);
  $titre = htmlentities($_POST["titre"]);
 
  $json = $livre->commentaires($db,$titre,$id);
 
}
echo json_encode($json);
 ?>