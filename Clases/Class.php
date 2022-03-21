<?php
class Class{
    private $id;
    private $code;
    private $subject;
    private $status;
//Constructor
    function __construct($id,$code,$subject,$status)
    {
        $this->id=$id;
        $this->code=$code;
        $this->subject=$subject;
        $this->status=$status;
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