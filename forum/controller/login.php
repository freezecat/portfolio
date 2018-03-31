<?php
// $])Cc
 $email = "";
 $password = "";
 $_SESSION["pseudo"] = "";
if(isset($_POST["email"]) && isset($_POST["password"]))
{
   if(!empty($_POST["email"]) && !empty($_POST["password"]))
	{
	   $email = htmlentities($_POST["email"]);
       $password = htmlentities($_POST["password"]);
	   
	   $sql = "SELECT pseudo,activation,email,password FROM membres WHERE email=:email && password = :password";
	   $req = $db->prepare($sql);
	   $req->execute(array(
	   ":email"=>$email,
	   ":password"=>sha1($password)
	   ));
	   $get = $req->fetch(PDO::FETCH_OBJ);
	   
	   if($get != null)
	   {
		   if($get->email == $email && $get->password == sha1($password))
		   {
			 $activation = $get->activation;
			 //echo $activation;
			 if($activation == 0)
			 {
			   echo "Activer votre compte ,un email vous a été envoyé lors de l'inscription";
			 }
			 else
			 {
			 $_SESSION["pseudo"] = $get->pseudo;
			    //echo "Bienvenue ".$_SESSION["pseudo"];
				header("Location:index.php?page=home");
				
			 }
		   }
	   }
	}
}
require "view/login.php";
 ?>