<?php 
include_once 'config/config.php';
Class User{

    private $CNX;
    private $user_username;
    private $user_password;
    private $user_name;
    private $user_lastname;
    private $user_email;
    private $user_typeid;
    private $user_state;

    public function __construct(){
        try {
            $this->CNX = new Conexion();
            
            //$this->CNX= config::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function validarUser($data){
        try {
            $query="SELECT count(*) as conta FROM users WHERE user_username = ?";
            $smt= $this->CNX->conectar()->prepare($query);
            $smt->execute(array($data->user_username));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function validarPassword($data){
        try{
            $query="SELECT count(*) as conta FROM users WHERE user_password = ?;";
            $smt= $this->CNX->conectar()->prepare($query);
            $smt->execute(array($data->user_password));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch(Excetion $e) {
            die($e->getMessage());
        }
    }

    public function validarPerson($data){
			try {
				$query="SELECT count(*) as conta FROM users WHERE user_username = ? and user_password = ?";
				$smt= $this->CNX->conectar()->prepare($query);
				$smt->execute(array($data->user_username, $data->user_password));
				return $smt->fetch(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				die($e->getMessage());
			}
        }
        
        public function cargarPerson($data){
			try {
				$query="SELECT u.user_id, u.user_username, u.user_password, u.user_email, u.user_name, u.user_lastname, u.user_state, t.type_position, t.type_state 
                from users u inner join type t on u.user_typeid= t.type_id WHERE
                                    u.user_username= ? and u.user_password = ?";
				$smt= $this->CNX->conectar()->prepare($query);
				$smt->execute(array($data->user_username,$data->user_password));
				return $smt->fetch(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				die($e->getMessage());
			}
        }  
        
        public function cargarTipo(){
            try{
                $query="SELECT * FROM type";
                $smt = $this->CNX->conectar()->prepare($query);
                $smt->execute();
                return $smt->fetchAll(PDO::FETCH_OBJ);
            } catch(Exception $e){
                die($e->getMessage());
            }
        }
}
?>