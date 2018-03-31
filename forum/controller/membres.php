<?php 
// $])Cc
$sql = "SELECT pseudo,date,avatar FROM membres";
$req = $db->query($sql);
$req->execute();
$membres = [];
while($get = $req->fetch(PDO::FETCH_OBJ))
{
 $membres[] = $get;
}
require "view/membres.php";
?>