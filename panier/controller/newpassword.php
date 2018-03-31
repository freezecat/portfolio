<?php
//$cC])
$token = "";
$code = "";
$date = strtotime(date("Y-m-d H:i:s"));
$password = "";
 $email="";
 
 
 function Raz($email)
 {
   global $db;
      		$sql2 = "UPDATE membres SET token=:token ,date=:date WHERE email=:email";
							  $req2 =  $db->prepare($sql2);
					  $req2->execute(array(
					  ":email"=>$email,
						":token"=>NULL,
						":date"=>NULL
					  ));
 }
 
 
if(isset($_GET["email"]) && isset($_GET["token"]))
{
   $email = htmlentities($_GET["email"]);
      $token = htmlentities($_GET["token"]);
	  
	   $sql = "SELECT email,token,date FROM membres WHERE email=:email";
			  $req =  $db->prepare($sql);
			  $req->execute(array(
			  ":email"=>$email
			  ));
	  

		
			
			  
			  while($get = $req->fetch(PDO::FETCH_OBJ))
			  {
			 // echo  $get->token;
			 
			     if($date - $get->date <=1800)
			        {
						if(isset($_POST["code"]) && isset($_POST["password"]))
						{
						  $code = htmlentities($_POST["code"]);
							$password = htmlentities($_POST["password"]);
					
						echo $date;
						
						
						 if(sha1($code) == $get->token)
						 {
							echo "Votre mot de passe a ete mis a jour!";
						
							$sql1 = "UPDATE membres SET password=:password WHERE email=:email && token=:token";
							  $req1 =  $db->prepare($sql1);
					  $req1->execute(array(
					  ":email"=>$email,
					   ":password"=>sha1($password),
						":token"=>sha1($code)
					  ));
					  
					   Raz($email);
							 
							
						 }
						 else
						 {
						   echo "Mauvais code";
						 }
					}
					require "view/newpassword.php";
				}
				else
					{
					   echo "Delai expire! recommencez => <a href='index.php?page=updatepassword'>ici</a>";
					   //update token à null et date à null
					    Raz($email);
					
					  
					  
					}
					
					
					  
			  }
	
}

 ?>