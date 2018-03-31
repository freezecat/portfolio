<?php 
//$])Cc
//unset SESSION panier , et envoie email de onfirmation d'ahat ,rajout +1 notifiation!

$alerte ="";
$argent = "";
$msg="";
$paiement = false;
$email ="";
$recapitulatif = [];

if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=="")
{

	$sql = "SELECT * FROM membres WHERE pseudo=:pseudo";
	$req = $db->prepare($sql);
	$req->execute(array(
	":pseudo"=>$_SESSION["pseudo"]
	));


	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
  $email = $get->email;
	  $argent =  intval($get->argent);
	  //$_SESSION["total"] => prix total de l'achat
	  
	  //si l'argent dont dispose le membre est supérieur à la somme total de son achat.
	   if($argent >= $_SESSION["total"])
	   {
	     
		
	     $argent = $argent - $_SESSION["total"];
		 $argent = intval($argent);
		 
		 $_SESSION["argent"] = $argent;
		 $msg = "Paiement effectué avec succès !";
		 
		 
		 $alerte = "alerte1";
		 
		 
		 
		 //diminue l'argent de pseudo après l'achat
		 $sql = "UPDATE membres SET argent=:argent WHERE pseudo=:pseudo";
		 $req = $db->prepare($sql);
		 $req->execute(array(
		 ":argent"=>$argent,
		 ":pseudo"=>htmlentities($_SESSION["pseudo"])
		 ));
		 
		 
		 	//recupère nom,prix,image pour chaque produit acheté
		 foreach($_SESSION["panier"] as $index=>$value)
		 {
		
			$sql1 = "SELECT nom,prix,image FROM articles WHERE id=:id";
			$req1 = $db->prepare($sql1);
			$req1->execute(array(
			  ":id"=>$index
			));
		
			while($get = $req1->fetch(PDO::FETCH_OBJ))
			{
			  $get->quantity = $_SESSION["panier"][$index];
			$serialize = serialize($get);
			 
			 //pour l'envoie d'email ,$recapitulatif sert à faire la liste d'achat
			 $recapitulatif[] = $get;
				
				//insere les données dans la bdd l'achat effectué par pseudo
				//qui seront récupérées dans monprofil.php
				
				$sql2 = "INSERT INTO achats(pseudo,achats,date) VALUES(:pseudo,:achats,:date)";
				$req2 = $db->prepare($sql2);
				$req2->execute(array(
				":pseudo"=>htmlentities($_SESSION["pseudo"]),
				":achats"=>$serialize,
				":date"=>htmlentities(date("Y-m-d H:i:s"))
				));
				
				
			}
			
		 }
		 //vide le panier après l'achat
		 unset($_SESSION["panier"]);
		 $_SESSION["total"]=0;
		 
		   
		  
		 	  
			  $sujet = "confirmation d'achat";
			  $txt = "Nous vous remercions pour votre visite ,vous trouverez ci_dessous un récapitulatif de votre achat:\n";
			      foreach($recapitulatif as $r)
			 {
			   $txt.= $r->quantity." ".$r->nom." à ".$r->prix." €\n";
			 }
			  $txt.= "A bientôt !";
			  
		
			  mail($email,$sujet,$txt);
			  
			  //creer une fonction notification qui incremente le nbr de notifications non lues
			  
	   }
	   else
	   {
		$msg = "Vous n'avez pas assez d'argent ,le paiement n'a pas aboutit";
	  
	   $alerte = "alerte2";
	   }
      }
	    

}
require "view/paiement.php";
?>