<?php 
//$cC])
$email = "";
$date = strtotime(date("Y-m-d H:i:s"));
$token = "";
$token_crypt = "";
$message = "";

if(isset($_POST["email"]))
{
  $email = htmlentities($_POST["email"]);
 
  
    //creation de token
		$str = [];
		 
		$letter = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
		 
		 $letter_index = [];

		for($i=0;$i<5;$i++)
		{

		  $num_letter = rand(0,1);
		   //0 pour un chiffre et 1 pour une lettre
		 
		 if($num_letter == 0)
		 {
		$str[$i] =  rand(0,9);
		  }
		  else
		  {
		  $letter_index[$i] = rand(0,25);
		  $str[$i] = $letter[$letter_index[$i]];
		  }
		}
		$token = implode("",$str);
		$token_crypt = sha1($token);
		 echo $email." ".$date." ".$token." ".$token_crypt."<br/>";
		 
		 
		 //BDD 
		 $sql = "UPDATE membres SET date=:date , token=:token WHERE email=:email";
		 $req = $db->prepare($sql);
		 $req->execute(array(
		 ":date"=>$date,
		 ":token"=>$token_crypt,
		 ":email"=>$email
		 ));
		 
		 
  
  
  $to = $email;
$subject = "Update password";
$txt = "Your code is :";
$txt .= $token."\r\n";
$txt .= "Click the link(available for 30 minutes) below to update your password!:"."\r\n";
$txt .= "http://localhost/Portfolio3/panier/index.php?page=newpassword&email=".$email."&token=".$token_crypt;
$headers = "From: freezecat@example.com" . "\r\n" .
"CC:";

mail($to,$subject,$txt,$headers);

   $message = "Vous avez reçu un mail!";
}
require "view/updatepassword.php";
?>