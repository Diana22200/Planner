<?php
class Mode{
    private $id;
    private $modality;
    private $session_time;
    private $education_level;
    function __construct($id,$modality,$session_time,$education_level){
        $this->id= $id;
        $this-> modality=$modality;
        $this-> session_time=$session_time;
        $this-> education_level=$education_level;
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