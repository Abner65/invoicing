<?php 
include_once 'config/config.php';
class Category{


    public function __construct(){
        try {
            $this->CNX= config::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarCategorias(){
        try{
            $query="SELECT * FROM category";
            $smt = $this->CNX->conectar()->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e){
            die($e->getMessage());
        }
    }










    
}
?>