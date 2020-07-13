<?php 
	class Conexion{

		private $cadena = "mysql: host=localhost;dbname=invoicing;charset=utf8";
    	private $username = "root";
		private $password = "";
		private $cn;

		public function conectar(){
			$this->cn=new PDO($this->cadena,$this->username,$this->password);
			$this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->cn;
		}

		
	}



 ?>