<?php 
require "../functions/membres.php";
$option ="";
$letter ="";
$liste_membre = [];
$i="";

$json = [];
if(isset($_POST["option"]))
{
  $option = htmlentities($_POST["option"]);
  //echo "php: ".$option;
   
   if($option == "ordre alphabetique")
   {
      
	  if(isset($_POST["letter"]))
	  {
	    $letter = htmlentities($_POST["letter"]);
	    // echo "php: ".$option." ".$letter;
		
		 $liste_membre = membre_letter($letter);
		
		//$tab = membre_letter($letter)->pseudo;
		//echo sizeof($liste_membre);
		//echo membre_letter($letter)[0]->pseudo;
		  
		 for($i=0;$i<sizeof($liste_membre);$i++)
		 {
		
		   $json["pseudo"][$i] = membre_letter($letter)[$i]->pseudo;
		   $json["date"][$i] = membre_letter($letter)[$i]->date;
		   $json["avatar"][$i] = membre_letter($letter)[$i]->avatar;
		 }
		
		 
	  }
	  //re// $])Ccup 1 ere lettre des pseudo les mettre dans un tableau dans l'ordre alpha, recup l'index 
	   
   }
   if($option == "date")
   {
     $liste_membre = membre_date();
	 for($i=0;$i<sizeof($liste_membre);$i++)
		 {
		
		   $json["pseudo"][$i] = $liste_membre[$i]->pseudo;
		   $json["date"][$i] = $liste_membre[$i]->date;
		   $json["avatar"][$i] = $liste_membre[$i]->avatar;
		 }
   }
  
}
echo json_encode($json);
?>