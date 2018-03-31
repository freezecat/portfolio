<?php

$pseudo = "";
$email = "";
$password = "";
$passwordbis = "";
$activation = "";
$date = date("Y-m-d H:i:s");
if(isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["passwordbis"]))
{
  if(!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["passwordbis"]))
  {
    $pseudo = htmlentities($_POST["pseudo"]);
	$email = htmlentities($_POST["email"]);
	$password = htmlentities($_POST["password"]);
	$passwordbis = htmlentities($_POST["passwordbis"]);
	$activation = 0;
	 $activation = intval($activation);
	

	
	  if(strlen($pseudo) >= 4 && preg_match("#^[a-zA-Z0-9]+$#",$pseudo))
	  {
	  //ex:9uIidfS
	    if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
		
		    if(strlen($password) == 8 && preg_match("#^[a-zA-Z!-_.]*$#",$password))
			{
			//par ex:Ar!h.y-_
			 
			 if($password == $passwordbis)
			 {
			 	//echo $pseudo." ".$email." ".$password." ".$passwordbis." ".$activation;
	   
		       //recaptcha GOOGLE
			   
			   	$secret = "YOUR_SECRET_KEY";
	// Paramètre renvoyé par le recaptcha
	$response = $_POST['g-recaptcha-response'];
	// On récupère l'IP de l'utilisateur
	$remoteip = $_SERVER['REMOTE_ADDR'];
	
	$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
	    . $secret
	    . "&response=" . $response
	    . "&remoteip=" . $remoteip ;
	
	$decode = json_decode(file_get_contents($api_url), true);
	
	if ($decode['success'] == true) {
		echo "Vous avez reçu un mail pour activer votre compte";
		    echo $pseudo." ".$email." ".$password." ".$passwordbis."<br/>";
		
		//BDD INSERT!
		
		//si pas d'insription insert sinon update!
		//ajouter date!!
		
		$sql1 = "SELECT * FROM membres WHERE email=:email";
		 $req1 = $db->prepare($sql1);
		 $req1->execute(array(
		 ":email"=>$email
		 ));
		  $count = $req1->rowCount();
		  
		  echo $count;
		  if($count == 0)
		  {
		 $sql = "INSERT INTO membres(pseudo,email,password,activation,date,avatar) VALUES(:pseudo,:email,:password,:activation,:date,:avatar)";
		 $req = $db->prepare($sql);
		 $req->execute(array(
		 ":pseudo"=>$pseudo,
		 ":email"=>$email,
		 ":password"=>sha1($password),
		 ":activation"=>$activation,
		 ":date"=>$date,
		 ":avatar"=>""
		 ));
		 }else
		 {
		 
		   	 $sql2 = "UPDATE membres SET date=:date WHERE email=:email";
		 $req2 = $db->prepare($sql2);
		 $req2->execute(array(
		 ":email"=>$email,
		 ":date"=>$date
		 ));
		 }
		 //envoie de mail pour l'activation du compte.
		 
		 $to = $email;
		$subject = "Activation compte";
		$txt = "Pour valider votre compte cliquer sur le lien:"."\r\n";
		$txt .= "http://localhost/Portfolio3/forum/index.php?page=activation&email=".$email."\r\n";
		$headers = "From: portfolio_forum@example.com" . "\r\n";
		
		
		

mail($to,$subject,$txt,$headers);
		 
	}
	
	else {
		echo  "Oups! Vous avez oublié de valider le recaptcha";
		//RIEN!
		
	}
			   
			   
		        
		     }
			 else
			 {
			  echo "mots de passes non identiques";
			 }
		  }
	   }
	   else
	   {
	     echo "email non valide";
	   }
	  }
	  else
	  {
	  echo "Le pseudo doit avoir au moins 4 lettres";
	  }
	  
  }
  else
  {}
}


require "view/signup.php";
 ?>