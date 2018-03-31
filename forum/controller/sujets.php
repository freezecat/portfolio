<?php 
$sujets = [];
$commentaire = [];
 
$smileys =[];
$tab = ["","jump!","'o'",":)","-D",":(","lov","--!","snif!","Oo",":p"];


$com = [];
$parent_id = "";

require "functions/children.php";
require "functions/poster.php";
   //voire controller/themes.php
             
			  
			
            
		

	        
   
  foreach($sujets = select("sujets","theme_id",$get->id) as $index=>$value)
			  {
			     
   if($value["sujet"] == $_GET["sujet"])
			  {
  
  
                       //attention transformer tous les string smiley en image! dont hanger le selet ave str_replae!!
					   
					   //à    echanger ! selet uniquement si parent_id !=0
					   
					  
					   
					   
					     $commentaire = select("commentaires","sujet_id",$value['id']);
						
						//echo var_dump($commentaire);
					
					 
                    $comment = buildTree($commentaire);
				
						 
						 
					   for($i=0;$i<11;$i++)
					   {
					 
					      array_push($smileys,"<img src='image/smiley".$i.".gif' alt='no'/>");
						  
						    //dans les commentaires , il y a des elements du tableau tab ,que l'on va remplaces par les elements de smiley dans la vue.
			             
						  
						  
					   }
					   
					    	if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
						 {
						   $pseudo  = htmlentities($_SESSION["pseudo"]);
							   if(isset($_GET["id"]))
							   {
								 
								 
									$parent_id = htmlentities($_GET["id"]);
									
									poster($value['id'],$commentaire,$pseudo,$parent_id);
							   }
							   else
							   {
								  $parent_id=0;
								
								 poster($value['id'],$commentaire,$pseudo,$parent_id);
							   }
					   
					   }
			
					 
					   
					
					   
					   
					
				}
				}
				
				
require "view/sujets.php";
?>