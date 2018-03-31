<?php
session_start();


spl_autoload_register(function($class){
   require "model/".$class.".class.php";
});


$database = new Database("localhost","portfolio_bibliotheque","root","");

$db = $database->getDatabase();

$livre = new Livre();

$date = date("Y-m-d H:i:s");
$expiration = strtotime($date);
//retour automatique des livres empruntes apres date limite.
$livre->retour($db,$expiration);

$membre = new Membre();

$vote = new Vote();

$top = new Top();



 $page = "";
 
  $tab = [".","..","header.php","content.php","footer.php","signup.php","login.php"];
 
 $list = []; 
 if(isset($_GET["page"]))
 {
      $dir = "controller/";
	  
	  //utiliser if file_exists controller/.page.".php" plutot!;
	  if(is_dir($dir))
	  {
	    // echo "yes";
		 if($dh = opendir($dir))
		 {
		   
		    
		      while(($file = readdir($dh)) !== false)
			  {
			     if(in_array($file,$tab))
				 {
				  
				 }
				 else
				 {
			        //echo  $file." \n";
					//remplit le tableau $list avec tous les fichiers ajoutés ,exceptés .,..,header,content,footer.
					array_push($list,$file);
				    
				}
			  }
			    closedir($dh);
				
		 }
	  }
	  else
	  {
	  echo "Pas de dossier de ce nom";
	  }
	  
	// echo var_dump($list);
	  $page = htmlentities($_GET["page"]);
	  
	  if(in_array($page.".php",$list))
	  {
	   // echo $page;
	     require "layout.php";
	  }
	  else
	  {
	   
		require "controller/error.php";
	  }
      
 }
 else
 {
  $page = "home";
  require "layout.php";
 }
 //
 ?>