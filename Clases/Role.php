<?php
class Role{
    private $id;
    private $type;
    function __construct($id,$type){
        $this->id=$id;
        $this->type=$type;
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