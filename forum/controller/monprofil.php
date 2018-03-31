<?php 
//$])Cc
$permitted=["jpg","png","gif","jpeg"];
$name = "";

$extension = "";
$avatar = "anonymous";
function avatar(){
 global $db;
 $sql ="SELECT avatar FROM membres WHERE pseudo = :pseudo";
		   $req = $db->prepare($sql);
		   $req->execute(array(
		   ":pseudo"=>$_SESSION["pseudo"]
		   ));
		   $avatar = $req->fetch(PDO::FETCH_OBJ)->avatar;
		   return $avatar;
}

if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
{
 
  $avatar = avatar();
  
   

if(isset($_FILES["fichier"]) && !empty($_FILES["fichier"]))
{
 $extension = pathinfo($_FILES["fichier"]["name"])["extension"];
 
 $name = htmlentities($_FILES["fichier"]["name"]);
 
 echo $_FILES["fichier"]["name"]." ".$_FILES["fichier"]["size"]." ".$_FILES["fichier"]["tmp_name"]." ".$extension."<br/>";
 
   if($_FILES["fichier"]["size"]<=1000000)
   {
      if(in_array($extension,$permitted))  
	  {
	
		 
		 
	     if(move_uploaded_file($_FILES["fichier"]["tmp_name"],"avatars/".$name))
		 {
		  
		   //select avatar where pseudo=session
		   
		  //avatar();
		   if($avatar == ""){
		     echo "premier upload!";
		   }
		   else
		   {
		   	 //supprime l'ancien fichier pour le  remplacer par le nouveau uploadé.
		     echo "l'ancien avatar:".$avatar." est remplace par ".$name;
		     unlink("avatars/".$avatar);
		   }
		   //update bdd membre set avatar!
		    $sql1 = "UPDATE membres SET avatar=:avatar WHERE pseudo=:pseudo";
			$req1 = $db->prepare($sql1);
		   $req1->execute(array(
		   ":avatar"=>$name,
		   ":pseudo"=>$_SESSION["pseudo"]
		   ));
		   
		     header("Location:index.php?page=monprofil");
		 }
		 
	  }
	  else
	  {
	    echo "extension du fichier non autorise.";
	  }
   }
   else
   {
     echo "fichier trop gros.";
   }


  
}

}

require "view/monprofil.php";
?>