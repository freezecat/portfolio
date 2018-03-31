<?php 
//$])Cc
$current_date = date("Y-m-d H:i:s");
$email = "";

if(isset($_GET["email"]))
{
$email = htmlentities($_GET["email"]);
//select date from membres ,if $date > date + 30 min alors lien expire.
$sql = "SELECT date FROM membres WHERE email = :email";
$req = $db->prepare($sql);
$req->execute(array(
":email"=>$email

));
$date = $req->fetch(PDO::FETCH_OBJ)->date;
echo $current_date." ".$date."<br/>";
$expiration = strtotime($current_date) - strtotime($date);
echo $expiration;
if($expiration <= 1800)
{
  //echo "lien valable";
  echo "Bravo ,vous etes dorenavant inscrit";
  //update 0 à 1
  
  
	  $sql1 = "UPDATE membres SET activation = :activation WHERE email = :email";
	$req1 = $db->prepare($sql1);
	$req1->execute(array(
	":email"=>$email,
	":activation"=>1
	));
}
else
{ 
   echo "lien expiré ,recommencez <a href='index.php?page=signup'>signup</a>";
}

}
require "view/activation.php";
?>