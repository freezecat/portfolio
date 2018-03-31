<?php 
// $])Cc
class Livre
{
    public function getInfo()
  {
     return $this->info;
  }
  
  public function liste($db)
  {
     
     $tab = [];
     $sql = "SELECT * FROM livres";
	 $req = $db->query($sql);
	 $req->execute();
	 while($get = $req->fetch(PDO::FETCH_OBJ))
	 {
	    $tab[] =  $get;
	 }
	 return $tab;
  }
  
  public function titre($db,$titre)
  {
    
     $sql = "SELECT * FROM livres WHERE titre=:titre";
	 $req = $db->prepare($sql);
	 $req->execute(array(
	 ":titre"=>$titre
	 ));
	 $get = $req->fetch(PDO::FETCH_OBJ);
	
	 return $get;
  }
  
  public function autres_livres($db,$titre)
  {
    $tab = $this->titre($db,$titre);
	
	$auteur = $tab->auteur;
	$tab2 =[];
	
	$sql = "SELECT titre,url FROM livres WHERE auteur=:auteur";
	 $req = $db->prepare($sql);
	 $req->execute(array(
	 ":auteur"=>$auteur
	 ));
	 while($get = $req->fetch(PDO::FETCH_OBJ))
	 {
	   $tab2[] = $get;
	 }
	 return $tab2;
	 
  }
  public function post($db,$titre,$a,$b)
  {
    $tb = [];
    $tb = $this->titre($db,$titre);
	$id = $tb->id;
	//return $id;
	
	$sql = "INSERT INTO commentaires(pseudo,commentaire,livre_id) VALUES(:pseudo,:commentaire,:livre_id)";
	$req = $db->prepare($sql);
	$req->execute(array(
	":pseudo"=>$a,
	":commentaire"=>$b,
	":livre_id"=>$id
	));
	
	
  }
  public function commentaires($db,$titre,$i)
  {
       
    $tab =[];
	
	//and $i BETWEEN $i*n+1 AND ($i+1)*n avec n=3 => si $i=0 ENTRE 1 et 3 si $i=1 entre 4 et 6
	
	$sql = "SELECT * FROM commentaires INNER JOIN livres ON commentaires.livre_id = livres.id WHERE livres.titre=:titre ORDER BY commentaires.id ASC LIMIT ".($i+1)*3;
	
	

	$req = $db->prepare($sql);
	$req->execute(array(
	":titre"=>$titre
	));
	while($get = $req->fetch(PDO::FETCH_OBJ))
	{
	  $tab[] = $get;
	}
	return $tab;
	
	
  }
  public function deja_emprunte($db,$titre,$pseudo)
  {
  	
  
   $sql = "SELECT COUNT(*) as emp FROM emprunts INNER JOIN livres ON emprunts.livre_id = livres.id WHERE emprunts.pseudo=:pseudo && livres.titre = :titre";
    $req = $db->prepare($sql);
	 $req->execute(array(
	 ":pseudo"=>$pseudo,
	 ":titre"=>$titre
	 
	 ));
	 $count = $req->fetch(PDO::FETCH_OBJ);
	 return $count->emp;
 
  }
  public function emprunt($db,$titre,$pseudo,$a,$b)
  {
     
$tb = $this->titre($db,$titre);
	 $livre_id = $tb->id;
	 $nbr = $tb->nombre;
	 //emprunt ou pas de l'utilisateur pour ce livre.
   
	 //return $count;
	 
	 //il reste des exemplaires de ce livre
	 if($nbr>0)
	 {
	   //l'utilisateur n'a pas encore emprunté ce livre
	 if($this->deja_emprunte($db,$titre,$pseudo)==0)
		 {
		   $sql1 = "INSERT INTO emprunts(pseudo,livre_id,date_depart,date_fin) VALUES(:pseudo,:livre_id,:date_depart,:date_fin)";
		   $req1 = $db->prepare($sql1);
		   $req1->execute(array(
		   ":pseudo"=>$pseudo,
		   ":livre_id"=>$livre_id,
		   ":date_depart"=>$a,
		   ":date_fin"=>$b
		   ));
		  
		     $sql2 = "UPDATE livres SET nombre = :nombre WHERE titre=:titre";
		   $req2 = $db->prepare($sql2);
		   $req2->execute(array(
		   ":titre"=>$titre,
		   ":nombre"=>$nbr-1
		
		   ));
		   $this->info = "emprunt effectue ".$nbr;
		 }
		//l'utilisateur à déjà emprunté ce livre.
	 else
		 {
		  $this->info = "Vous avez deja emprunte ce livre,vous pourrez l'empruntez après l'avoir rendu";
		 }
	 }
	  //rupture de stock du livre
	 else
	 {
	 $this->info = "Livre en rupture de stock";
	 }
   }
   
   
   public function date_echeance($db,$titre)
   {
     $tb = $this->titre($db,$titre);
	
	 
	 $livre_id =$tb->id;
	 //si il y a un emprunt en cours

	 

	
	 $end = [];
	 
	 //inner join
	 $sql = "SELECT date_fin,date_depart,pseudo FROM emprunts INNER JOIN livres ON emprunts.livre_id = livres.id WHERE livres.titre = :titre";
	  $req = $db->prepare($sql);
	 $req->execute(array(
	 ":titre"=>$titre
	 ));
	 
	 while($get = $req->fetch(PDO::FETCH_OBJ))
	 {
	   $end[] = $get;
	 }
	 //retourne un tableau qui liste les emprunts en cours: pseudo et date de retour
	 return $end;
	 
	 
	 
	
	 
   }
   
   public function retour($db,$expiration)
   {
   
		   $sql = "SELECT livre_id FROM emprunts WHERE date_fin<:expiration";
$req = $db->prepare($sql);
$req->execute(array(
  ":expiration"=>$expiration
));
while($livre_id = $req->fetch(PDO::FETCH_OBJ))
{
 foreach($livre_id as $v)
{
  
  //echo $v."<br/>";
  $id = $v;
  $sql1 = "SELECT nombre FROM livres WHERE id = :id";
  $req1 = $db->prepare($sql1);
  $req1->execute(array(
  ":id"=>$v
  ));
  $nbr = $req1->fetch(PDO::FETCH_OBJ)->nombre;
  
  echo $nbr."<br/>";
  
  $sql2 = "UPDATE livres SET nombre=:nombre WHERE id=:id";
  $req2 = $db->prepare($sql2);
  $req2->execute(array(
  ":id"=>$v,
  ":nombre"=>$nbr+1
  ));
}
}
$sql3 = "DELETE FROM emprunts WHERE date_fin<:expiration";
$req3 = $db->prepare($sql3);
$req3->execute(array(
  ":expiration"=>$expiration
));

   }

   public function search($db,$a)
   {
      $res = [];
      $sql = "SELECT titre FROM livres WHERE titre like :a";
	  $req = $db->prepare($sql);
	  $req->execute(array(
	  ":a"=>$a."%"
	  ));
	  while($get = $req->fetch(PDO::FETCH_OBJ))
	  {
	     $res[] = $get;
	  }
      return $res;
   }
	
  

}

?>