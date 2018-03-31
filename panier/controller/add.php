<?php 
//$])Cc
$nom = "";
$prix = "";
$file = "";
$extension = "";
$tab = ["png","jpg","gif","jpeg","svg"];
$description = "";

if(isset($_POST["nom"],$_POST["prix"],$_POST["description"],$_FILES["image"]) && !empty($_POST["nom"]) && !empty($_POST["prix"]) && !empty($_POST["description"]) && !empty($_FILES["image"]))
{

$nom = htmlentities($_POST["nom"]);
$prix = htmlentities($_POST["prix"]);
$file = htmlentities($_FILES["image"]["name"]);
$extension = pathinfo($file,PATHINFO_EXTENSION);
$msg = "";

$description = htmlentities($_POST["description"]);
echo $nom." ".$prix." ".$file." ".$extension." ".$description."<br/>";
   
   if($_FILES["image"]["size"]<=1000000)
   {
   
      if(in_array($extension,$tab))
	  {
	   $sql = "INSERT INTO articles(nom,prix,image,description) VALUES(:nom,:prix,:image,:description)";
	   $req = $db->prepare($sql);
	   $req->execute(array(
	   ":nom"=>$nom,
	   ":prix"=>$prix,
	   ":image"=>$file,
	   ":description"=>$description
	   ));
	   
	   
	   
	   
	       if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$file))
		   {
		     $msg = "file uploaded!";
			 
			   
			  
		   }
		   //envoie de mail ,nouvel article!!
		   $sql1 = "SELECT email FROM membres WHERE newsletter=:newsletter";
		   $req1 = $db->prepare($sql1);
		   $req1->execute(array(
		   ":newsletter"=>1
		   ));
		   while($send = $req1->fetch(PDO::FETCH_OBJ))
		   {
		      	     $to = $send->email;
$subject = "Nouvel article";


$txt = "Decouvrez :".$nom." en cliquant sur le lien ci-dessous!"."\r\n";
$txt .= "http://localhost/Portfolio3/panier/index.php?page=newarticle";
$headers = "From: freezecat@example.com" . "\r\n" .
"CC:";

mail($to,$subject,$txt,$headers);

   $message = "Vous avez reçu un mail!";
		   }
		   
		
	   }
	   else
	   {
	   $msg = "Format du fichier inconnu!";
	   }
   
   }
   else
   {
        $msg = "Fichier trop gros!";
		
   }
   
   
}
require "view/add.php";
?>