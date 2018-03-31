<?php 
class Vote
{
  

  
  public function like_dislike($db,$titre,$pseudo,$vote)
  {
    

	//permet de verifier si le membre a voté ou pas.
	$sql1 = "SELECT COUNT(*) as likeit FROM vote INNER JOIN livres ON vote.livre_id = livres.id WHERE vote.pseudo=:pseudo && livres.titre=:titre";
	//$sql1 = "SELECT * FROM vote WHERE pseudo=:pseudo && livre_id=:livre_id";
	$req1 = $db->prepare($sql1);
	$req1->execute(array(
	":pseudo"=>$pseudo,
	":titre"=>$titre
	));
	$count = $req1->fetch(PDO::FETCH_OBJ);
	

	
	  $sql2 = "SELECT id FROM livres WHERE titre=:titre";
	  $req2 =$db->prepare($sql2);
	    $req2->execute(array(
	   ":titre"=>$titre
	   ));
	   $id = $req2->fetch(PDO::FETCH_OBJ)->id;
	
	if($count->likeit == 0) 
	{
	  //le membre n'a pas encore voté.
	  
	
	   $sql3 = "INSERT INTO vote(pseudo,likes,dislikes,livre_id) VALUES(:pseudo,:likes,:dislikes,:livre_id)";
	   $req3 = $db->prepare($sql3);
	   
	   
	  if($vote == "likes")
	  {
	   $req3->execute(array(
	   ":pseudo"=>$pseudo,
	   ":likes"=>1,
	   ":dislikes"=>0,
	   ":livre_id"=>$id
	   ));
	  }
	  else
	  {
	    $req3->execute(array(
	   ":pseudo"=>$pseudo,
	   ":likes"=>0,
	   ":dislikes"=>1,
	   ":livre_id"=>$id
	   ));
	  }
	  
	  
	  return "Merci d'avoir vote";
	}
	else
	{
	  return "Vous avez deja vote";
	}
	
  }
  
  public function likes($db,$titre)
  {
 
	
	$sql = "SELECT COUNT(*) as thumb_up FROM vote INNER JOIN livres ON vote.livre_id=livres.id WHERE livres.titre = :titre && vote.likes=:likes";
	
	
	
	
	$req = $db->prepare($sql);
	$req->execute(array(
	":likes"=>1,
	":titre"=>$titre
	));
	$count = $req->fetch(PDO::FETCH_OBJ);
	
	return $count;

  }
    public function total($db,$titre)
  {

	

	  	$sql = "SELECT COUNT(*) as total FROM vote INNER JOIN livres ON vote.livre_id=livres.id WHERE livres.titre = :titre";
	$req = $db->prepare($sql);
	$req->execute(array(
	":titre"=>$titre
	) 
	);
	
	
    $count = $req->fetch(PDO::FETCH_OBJ);
	
	return $count;

  }
}
?>