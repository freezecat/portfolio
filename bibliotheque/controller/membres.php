<?php 
$membres = $membre->membres($db);
$pseudo ="";
if(isset($_GET["pseudo"]))
{
$pseudo = htmlentities($_GET["pseudo"]);
$livre = $membre->livre($db,$pseudo);
$com = $membre->commentaires($db,$pseudo);
}
require "view/membres.php";
?>