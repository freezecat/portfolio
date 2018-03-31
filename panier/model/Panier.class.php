<?php 
class Panier
{
  public function __construct()
  {
     if(!isset($_SESSION))
	 {
	   session_start();
	   
	      if(!isset($_SESSION["panier"]))
	   {
	   $_SESSION["panier"]= [];
	   }
	 }
  }
  public function add($id)
  {
      
		if(!isset($_SESSION["panier"][$id]))
		{
		  return  $_SESSION["panier"][$id] = intval(1);
		  	
		}
		if($_SESSION["panier"][$id]>=1)
		{
		  return  intval($_SESSION["panier"][$id]++);
		  	
		}
		
  }
  
}
?>