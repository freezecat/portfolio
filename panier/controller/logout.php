<?php 
session_destroy();
unset($_SESSION["pseudo"]);
header("Location:index.php");
?>