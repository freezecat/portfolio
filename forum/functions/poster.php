<?php
//fonction pour poster des commentaires et reponses.
	function poster($sujet_id,$commentaire,$pseudo,$val)
			{
			            global $db;
						$date = date("Y-m-d H:i:s");
			   		  	if(isset($_POST["commentaire"]))
						 {
					    
						   $commentaire = htmlentities($_POST["commentaire"]);
						 
						   //introduire avatar dans membres , puis select avatar where pseudo=session! ici $avatar = avatar(); voire monprofil.php
						  $sql ="SELECT avatar FROM membres WHERE pseudo = :pseudo";
						   $req = $db->prepare($sql);
						   $req->execute(array(
						   ":pseudo"=>$pseudo
						   ));
						   $avatar = $req->fetch(PDO::FETCH_OBJ)->avatar;
						  
						  //introduire pseudo et avatar et ne pas oublier de l'intro dans buildtree !!
						   
						   $sql4 = "INSERT INTO commentaires(sujet_id,commentaire,parent_id,pseudo,date,avatar) VALUES(:sujet_id,:commentaire,:parent_id,:pseudo,:date,:avatar)";
						   $req4 = $db->prepare($sql4);
						   $req4->execute(array(
						   ":sujet_id"=>$sujet_id,
						   ":commentaire"=>$commentaire,
						   ":parent_id"=>$val,
						   ":pseudo"=>$pseudo,
						   ":date"=>$date,
						   ":avatar"=>$avatar
						   ));
						    header("Location:index.php?page=themes&theme=".$_GET['theme']."&sujet=".$_GET["sujet"]);
					
						 }
			}
 ?>