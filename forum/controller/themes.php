<?php 
// $])Cc
$titre = "";
$theme_id = "";
$sujet = [];
$sujet_id = "";

 function select($table,$id,$value)
 { 
 global $db;
 $tab = [];
  $sql = "SELECT * FROM ".$table." WHERE ".$id."  = :id";
  $req = $db->prepare($sql);
		$req->execute(array(
		":id"=>$value
		));
  while($get = $req->fetch(PDO::FETCH_ASSOC))
  {
    $tab[] = $get;
  }
  return $tab;
 }
 
  

$sql = "SELECT id,theme FROM themes";
 $req =$db->query($sql);
 $req->execute();
 
while($get = $req->fetch(PDO::FETCH_OBJ))
{
  $theme[] = $get;
  
    if(isset($_GET["theme"]) && $get->theme == $_GET["theme"])
    {  
  //echo $get->theme." ".$get->id."<br/>";
  
     	if(isset($_GET["sujet"]))
	    {
		    require "sujets.php";
	    }
		 else
	    {
		    $sujet = select("sujets","theme_id",$get->id);
	       //echo var_dump(select("sujets","theme_id",$get->id))."<br/>";
		}
		   // echo $get->theme." ".$get->id."<br/>" ;
		
		if(isset($_POST["titre"]) && isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!="")
		{
			$titre = htmlentities($_POST["titre"]);
			$pseudo  = htmlentities($_SESSION["pseudo"]);
			   
			echo $titre." ".$pseudo." ".$theme_id."<br/>";
			   
			   	
			   
			$sql3 = "INSERT INTO sujets(theme_id,sujet) VALUES(:theme_id,:sujet)";
			$req3 = $db->prepare($sql3);
			$req3->execute(array(
			":theme_id"=>$get->id,
			":sujet"=>$titre
			));
			   
			header("Location:index.php?page=themes&theme=".$_GET['theme']."&sujet=".$titre);
		}	
		else
	    {
			echo "Pour poster vous devez etre connecte! identifiez-vous <a href='index.php?page=login'>ici</a>";
	    }
	}
  
  
}

  







require "view/themes.php";
?>