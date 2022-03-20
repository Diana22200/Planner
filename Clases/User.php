<?php
class User{
    private $id;
    private $name_doc;
    private $acronym_doc;
    private $num_doc;
    private $status;
    private $names;
    private $surname;
    private $url_prof_pic;
    private $email;
    private $password;
//Constructor
    function __construct($id, $name_doc, $acronym_doc, $num_doc, $status, $names, $surname, $url_prof_pic, $email, $password)
    {
        $this->id=$id;
        $this->name_doc=$name_doc;
        $this->acronym_doc=$acronym_doc;
        $this->num_doc=$num_doc;
        $this->status=$status;
        $this->names=$names;
        $this->surname=$surname;
        $this->url_prof_pic=$url_prof_pic;
        $this->email=$email;
        $this->password=$password;
    }
//get
    function __get($propiedad)
    {
        if(property_exists($this, $propiedad)){
            return $this->$propiedad;
        }
    }
//set
    function __set($propiedad, $value)
    {
        if(property_exists($this, $propiedad)){
            return $this->$propiedad = $value;
        }
    }
    /*Este corchete cierra la clase, aquí solo deben ir métodos o sino dará error */
}
//Metodos
/* 
function nombreCompleto(){
    $nombrec=$this->names ." ". $this->surname;
    return $nombrec;
}
}
$usuario = new User(1, "Cédula de Ciudadanía", "CC", 1001348758, "Activo", "Diana", "Guevara", "una url", "sdguevara85@misena.edu.co", "odioelmundo");
echo "Hola ".$usuario->nombreCompleto(); 
$usuario = new User(1, "Cédula de Ciudadanía", "CC", 1001348758, "Activo", "Anyi", "Becerra", "una url", "sdguevara85@misena.edu.co", "odioelmundo");
echo "Hola ".$usuario->nombreCompleto(); 
echo $usuario->__get("id"); */
?>