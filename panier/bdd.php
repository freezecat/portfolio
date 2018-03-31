<?php
try
{
$db = new PDO("mysql:host=localhost;dbname=Portfolio_panier","root","");
}
catch(PDOException $e)
{
  echo "Erreur :".$e->getMessage();
}

 ?>