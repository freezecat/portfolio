<?php 
//$)]Cc
class Database
{
  private $host;
  private $user;
  private $password;
  private $database;
  private $db;
  
  public function __construct($host,$database,$user,$password)
  {
      $this->host = $host;
     if($host!=null)
	 {
	    $this->database =  $database;
		 $this->user = $user;
		  $this->password = $password;
	 }

 
	 try
	 {
 $this->db = new PDO("mysql:host=".$host.";dbname=".$database,$user,$password);
	 }
	 catch(PDOException $e)
	{
	  echo $e->getMessage();
	}
  
	 
  }
  
  public function getDatabase()
  {
    return $this->db;
  }
  
 
}
$database = new Database("localhost","portfolio_bibliotheque","root","");


$db = $database->getDatabase();







?>