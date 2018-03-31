<?php
class Membre
{
  public function membres($db)
  {
  $liste = [];
    $sql = "SELECT pseudo FROM inscrits";
	$req = $db->query($sql);
	$req->execute();
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $liste[] = $get;
	}
	return $liste;
	
  }
  
  
  
  public function livre($db,$pseudo)
  {
   $livre = [];
    $sql = "SELECT * FROM emprunts WHERE pseudo=:pseudo";
	$req = $db->prepare($sql);
	$req->execute(array(
	":pseudo"=>$pseudo
	));
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	$livre[] = $get;
	  
	}
	return $livre;
  }
  
  public function emprunt($db,$livre)
  {
     
	 $liste =[];
	 
	 
	 $sql = "SELECT * FROM livres WHERE id=:id";
	 $req = $db->prepare($sql);
	 $req->execute(array(
	 ":id"=>$livre
	 ));
	 while($get = $req->fetch(PDO::FETCH_OBJ))
	 {
	   $liste[] = $get;
	 }
	 return $liste;
	 
  }
  
  public function commentaires($db,$pseudo)
  {
  	 $com =[];
	 
	 
	 $sql = "SELECT * FROM commentaires WHERE pseudo=:pseudo";
	 $req = $db->prepare($sql);
	 $req->execute(array(
	 ":pseudo"=>$pseudo
	 ));
	 while($get = $req->fetch(PDO::FETCH_OBJ))
	 {
	   $com[] = $get;
	 }
	 return $com;
	 //$this->emprunt
  }
}
 ?>