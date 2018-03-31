<?php
$id="";
if(isset($_GET["id"]))
{
$id = htmlentities($_GET["id"]);

unset($_SESSION["panier"][$id]);
  //var_dump($_SESSION["panier"][$id]);
 header("location:index.php?page=panier");
}
var_dump($_SESSION);
//require "view/supprimer.php";
 ?>