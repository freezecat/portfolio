<?php
session_start();

// $])Cc

$db = new PDO("mysql:host=localhost;dbname=portfolio_forum","root","");
 $page = "";
 
  $tab = [".","..","header.php","content.php","footer.php"];
 
 $list = []; 
 if(isset($_GET["page"]))
 {
      $dir = "controller/";
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