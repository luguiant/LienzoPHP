<?php
class UsuariosController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
        //instancia la clase conectar  
		$this->conectar=new Conectar();
        //carga el metodo de la conexion
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto usuario
        $usuario=new Usuario($this->adapter);
        
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAll();

		//Producto
        $producto=new Producto($this->adapter);
		$allproducts=$producto->getAll();
       
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "allusers"=>$allusers,
			"allproducts" => $allproducts
        ));
    }
    
    public function crear(){
        if(isset($_POST["nombre"]))
        {
            //Creamos un usuario
            $usuario=new Usuario($this->adapter);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            if($_POST["password"]!=null){
               $usuario->setPassword(sha1($_POST["password"]));
            }else{
               $usuario->setPassword();  
            }
            $save=$usuario->save();
        }
         $this->redirect();
       
    }
    
    public function borrar(){
        if(isset($_GET["id"]) and is_numeric($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $usuario=new Usuario($this->adapter);
            $usuario->deleteById($id); 
        }
        $this->redirect();
    }

    public function editar(){
       if(isset($_GET["id"]) and is_numeric($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $usuario = new Usuario($this->adapter);

            $info    = $usuario->getById($id); 
            //existe el usuario??
            if(isset($info) and count($info) > 0)
            {
              //cargamos el usuario para editar 
              $this->view("edit",array(
                   "allusers"=>$info
                 ));

            }else{
              //ir al index
              $this->redirect("Usuarios","index"); 

            }
            
        }else{
          $this->redirect();  
        }
        
        
    }

    public function guardaredicion(){
        if(isset($_POST["nombre"]))
        {
            $usuario=new Usuario($this->adapter);
            $usuario->setId($_POST["id"]);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            if($_POST["password"]!=null){
               $usuario->setPassword(sha1($_POST["password"]));
            }else{
               $usuario->setPassword();  
            }
            $save=$usuario->update();
        }
        $this->redirect();  
          
    }
    
    
  

}
?>
