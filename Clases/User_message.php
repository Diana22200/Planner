<?php
class User_message{
    private $id;
    private $situation;
//Constructor
    function __construct($id,$situation)
    {
        $this->id=$id;
        $this->situation=$situation;
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