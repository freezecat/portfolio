<?php
$titre = "";
if(isset($_GET["titre"]))
{
$titre =htmlentities($_GET["titre"]);
$elt = $livre->titre($db,$titre);
}
require "view/vote.php";
 ?>