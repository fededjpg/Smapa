<?php 
 	class Database{

 		private $servername = "localhost";
 		private $username = "root";
 		private $password = "";
 		private $db_name = "registros";
 		public $con;

 		public function conexion(){
 			$this->con = null;
 			try{
 				$this->con = new PDO("mysql:host=".$this->servername.";dbname=".$this->db_name,$this->username,$this->password);
 				$this->con->exec("set names utf8");
 			}catch(PDOException $ex){
 				echo "Error al conectar: ".$ex->getMessage();
 			}
 			return $this->con;
 		}
 	}
 	/*
 	$database = new Database();
 	$objConexion = $database->conexion();
 	if($objConexion){
 		echo "Conexion Exitosa";
 	}
 	*/

?>
