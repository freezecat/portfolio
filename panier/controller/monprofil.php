<?php 
//$])Cc
$mes_achats = [];
$date = "";


$sql = "SELECT achats,date FROM achats WHERE pseudo=:pseudo";
$req = $db->prepare($sql);
$req->execute(array(
":pseudo"=>htmlentities($_SESSION["pseudo"])
));
while($get = $req->fetch(PDO::FETCH_OBJ))
{
$mes_achats[]= $get;
 
}

$sql = "SELECT pseudo,gender,email,argent,statut FROM membres WHERE pseudo=:pseudo";
$req = $db->prepare($sql);
$req->execute(array(
":pseudo"=>htmlentities($_SESSION["pseudo"])
));
while($get = $req->fetch(PDO::FETCH_OBJ))
{
$mon_profil[]= $get;
 
}

require "view/monprofil.php";
?>