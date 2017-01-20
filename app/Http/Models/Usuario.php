<?php
class Usuario extends EntidadBase{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    
    public function __construct($adapter) {
        $table="usuarios";

        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
          
          try{
                  if($nombre != null){
                   $this->nombre = $nombre;
                  }else{
                      throw new Exception('El nombre es requerido');
                  }
          }catch (Exception $e) {
             
              echo "Error: ".$e->getMessage();
              exit(1);
          }
           
          
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        
          try{
                  if($apellido != null){
                   $this->apellido = $apellido;
                  }else{
                      throw new Exception('El apellido es requerido');
                  }
          }catch (Exception $e) {
             
              echo "Error: ".$e->getMessage();
              exit(1);
          }
           
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        
          try{
              if( $email != null)
              {

               $this->email = $email;

              }else{

                  throw new Exception('El email es requerido');

              }
          }catch (Exception $e) {
             
              echo "Error: ".$e->getMessage();
              exit(1);
          }
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        
          try{
              if($password != null){

                 $this->password = $password;

              }else{

                  throw new Exception('El password es requerido');

              }
          }catch (Exception $e) {
             
              echo "Error: ".$e->getMessage();
              exit(1);
          }
    }

    public function save(){
        if($this->nombre!=null and 
           $this->apellido!=null and 
           $this->email!=null and 
           $this->password!=null){
            $query="INSERT INTO usuarios (id,nombre,apellido,email,password)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',
                       '".$this->password."');";
            $save=$this->db()->query($query);
            //$this->db()->error;
            return $save;
        }
       
    }

    public function update(){
            $query="UPDATE usuarios SET nombre   = '".$this->nombre."',
                                        apellido = '".$this->apellido."',
                                        email    = '".$this->email."',
                                        password = '".$this->password."' 
                                        where id = ".$this->id.";";
            $update=$this->db()->query($query);
            return $update;
    }
}
?>