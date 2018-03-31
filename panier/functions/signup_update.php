<?php 
//fonction qui permet de verifier i le pseudo ou l'email et deja utiliser lor de l'inscription.
 function check($variable,$post)
{
global  $db;
  

  
  $sql = "SELECT * FROM membres WHERE ".$variable." =:value";
  $req = $db->prepare($sql); 
  $req->execute(
    array(
	":value"=>$post
	)
  );
 while($get = $req->fetch(PDO::FETCH_OBJ))
 {
   return $get->$variable;
 }

}




function update($gender,$pseudo,$email,$password,$newsletter,$session)
{

global $db;
$sql = "UPDATE membres SET gender=:gender,pseudo=:pseudo,email=:email,password=:password,newsletter=:newsletter WHERE pseudo=:session";
$req = $db->prepare($sql);
		$req->execute(array(
		
		":gender"=>$gender,
		":pseudo"=>$pseudo,
		":email"=>$email,
		":password"=>$password,
		":newsletter"=>$newsletter,
		":session"=>$session
		));
		
		$_SESSION["pseudo"]= $pseudo;
     header("Location:index.php");
}



function signup($gender,$pseudo,$email,$password,$newsletter)
{

global $db;
$sql = "INSERT INTO membres(gender,pseudo,email,password,newsletter,argent,statut) VALUES(:gender,:pseudo,:email,:password,:newsletter,:argent,:statut)";
$req = $db->prepare($sql);
		$req->execute(array(
		
		":gender"=>$gender,
		":pseudo"=>$pseudo,
		":email"=>$email,
		":password"=>$password,
		":newsletter"=>$newsletter,
		":argent"=>10000,
		":statut"=>"membre"
		));
}

function signup_update($callback)
{
//champs identiques pour view/signup.php et view/moncompte.php

if(isset($_POST["gender"],$_POST["pseudo"],$_POST["email"],$_POST["password"]))
{
   if(!empty($_POST["gender"]) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
   {
		   
		   
				  $gender = htmlentities($_POST["gender"]);
			   $pseudo = htmlentities($_POST["pseudo"]);
			   $email = htmlentities($_POST["email"]);
			   $password = htmlentities(sha1($_POST["password"]));
			
			
	              
				    
						 if(filter_var($email,  FILTER_VALIDATE_EMAIL))
						 {

							 if(strlen($_POST["password"])>=8)
							 {
						
							if(!empty($_POST["newsletter"]))
							{
							  
							  $newsletter = 1;
							}
							else  
							{
							  $newsletter = 0;
							}
							
							
							
						
							
							//verif que pseudo est unique!
							
							
						
								if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=="")
							{
							
							     if(check("pseudo",$pseudo)!==$pseudo)
					              {
							 $session = htmlentities($_SESSION["pseudo"]);
							
							 //pour la fonction update => moncompte.php
							 $callback($gender,$pseudo,$email,$password,$newsletter,$session);
							    }
									else
								{
								   echo "Pseudo deja utilise";
								}
								
							}
							else
							{
							//verifie si le pseudo ou l'email a deja ete choisi par un autre membre
							//évite un membre d'avoir plusieurs comptes avec le meme email
							     if(check("pseudo",$pseudo)!==$pseudo && check("email",$email)!==$email)
					             {
							//pour la fonction signup => signup.php
							$callback($gender,$pseudo,$email,$password,$newsletter); 
							     }
								 	else
									{
									   echo "Pseudo ou Email deja utilise";
									}
							}
						
								}
								else
								{
								echo "Le mot de passe doit contenir au moins 8 caractères";
								}
							
							}
							else
							{
							  echo "email non valide.";
							}
							
						
						 
						   
						}
					
				
				
	}
	else
	{
	   echo "Remplissez tout";
	}

	
}

?>