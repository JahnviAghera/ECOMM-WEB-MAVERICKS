<?php

Class Database{
//  // Database connection details
// $host = 'sql111.infinityfree.com'; 
// $db = 'if0_38194361_shopping';    
// $user = 'if0_38194361';           
// $pass = 'goeskQX6J69wO';          

	private $server = "mysql:host=sql111.infinityfree.com;dbname=if0_38194361_ecom";
	private $username = "if0_38194361";
	private $password = "goeskQX6J69wO";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

$pdo = new Database();
 
?>