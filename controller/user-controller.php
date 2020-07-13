<?php 
session_start();
include_once 'model/user.php';
//include_once 'config/private.php';
Class UserController{
    
    public $MODEL;
    
    public function __construct(){
         $this->MODEL = new User(); 
    }

    public function index(){
        include_once 'view/login.php';
    }

    public function ir(){
        $pagina= $_REQUEST['type'];
        include_once 'view/'. $pagina. ".php";
    }


    public function validar(){
        try{
        $valUser = new User();
        $valUser->user_username = $_POST['txtUsername'];
        $valUser->user_password = $_POST['txtPassword'];
        $valor= $this->MODEL->validarUser($valUser);
        
        if($valor->conta != 0){

                $valor= $this->MODEL->validarPassword($valUser);

                if($valor->conta != 0){

                    $valor= $this->MODEL->validarPerson($valUser);

                    if($valor->conta != 0){

                        $valor= $this->MODEL->cargarPerson($valUser);
                        if($valor->type_position == "Administrador"){
                            header("Location: index.php?c=ir&type=admin");
                            
                        }else{
                            header("Location: index.php?c=ir&type=vendedor");
                        }
                        $_SESSION['nombre'] = $valor->user_name;
						$_SESSION['apellido'] = $valor->user_lastname;
						$_SESSION['acceso'] = 1;


                    }else{
                        $msj2="Sus datos no coinciden";
                        include_once 'view/login.php';
                    }

                }else{
                    $msj2= "Esta contraseña no existe";
                    include_once 'view/login.php';
                }

        }else{
            $msj1 = "Este usuario no existe";
            include_once 'view/login.php';
        }
    }catch(Exception $e){
            die($e->getMessage());
    }
        

    }

    public function nuevo(){
        include_once 'View/save.php';
    }

    public function categoria(){
        include_once 'view/almacen/categoria.php';
    }

    public function producto(){
        include_once 'view/almacen/producto.php';
    }

   








}
?>