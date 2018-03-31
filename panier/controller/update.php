<?php 
$id="";
$qte= "";
//si on update la quantité du produit 1 on recupere  $_POST["qte1"];
if(isset($_GET["id"]) && isset($_POST["qte".$_GET["id"]]))
{

  $id = htmlentities($_GET["id"]);
   $qte = htmlentities($_POST["qte".$_GET["id"]]);
   
   if(ctype_digit($qte) && $qte>0)
   {
     $_SESSION["panier"][$id] = intval($qte);
   }
   header("location:index.php?page=panier");
}
require "view/update.php";
?>