<?php 
//$])Cc
$membre = [];

$pseudo = "";

$sql = "SELECT * FROM membres WHERE pseudo=:pseudo";
$req = $db->prepare($sql);
$req->execute(array(
":pseudo"=>htmlentities($_SESSION["pseudo"])
));
while($get = $req->fetch(PDO::FETCH_OBJ))
{
  $membre[] = $get;
 
}

require "functions/signup_update.php";


signup_update('update');


require "view/moncompte.php";
?>