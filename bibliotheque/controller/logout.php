<?php 
session_destroy();
$_SESSION = [];
$_SESSION["pseudo"] = "";
header("Location:index.php");
?>