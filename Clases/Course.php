<?php
class Course{
    private $id;
    private $code;
    private $status;
    private $num_students;
    private $program_name;
    private $trimestre;
//Constructor
    function __construct($id,$code,$status,$num_students,$program_name,$trimestre)
    {
        $this->id=$id;
        $this->code=$code;
        $this->status=$status;
        $this->num_students=$num_students;
        $this->program_name=$program_name;
        $this->trimestre=$trimestre;
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
?>