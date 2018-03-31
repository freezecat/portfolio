<?php
class Inscrits
{
 
 
  public function getInfo()
  {
    return $this->info;
  }
  public function signup($db,$a,$b,$c)
  {
    //faire un select avec l'email si deja inscrit!
   $sql = "SELECT * FROM inscrits WHERE email =:email";
    $req = $db->prepare($sql);
    $req->execute(array(
   ":email"=>$b
    ));
   $count = $req->rowCount();
   
   if($count == 0)
   {
   
   $sql2 = "INSERT INTO inscrits(pseudo,email,password) VALUES(:pseudo,:email,:password)";
   $req2 = $db->prepare($sql2);
   $req2->execute(array(
   ":pseudo"=>$a,
   ":email"=>$b,
   ":password"=>$c
   ));
      
	 $this->info = "Vous etes inscrit!";
   }
   else
   {
     $this->info = "Il existe deja un compte avec cet adresse mail!";
   }
  }
  
  public function login($db,$b,$c)
  {
  $tab = [];
    $sql = "SELECT * FROM inscrits WHERE email=:email && password =:password";
	 $req = $db->prepare($sql);
   $req->execute(array(
   ":email"=>$b,
   ":password"=>$c
   ));
   while($get = $req->fetch(PDO::FETCH_OBJ))
   {
   $tab[] = $get;
   }
   return $tab;
  }
  
  
}
 ?>