<?php
class Qualification{
    private $id;
    private $score;
    function __construct($id,$score){
        $this->id=$id;
        $this->score=$score;
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