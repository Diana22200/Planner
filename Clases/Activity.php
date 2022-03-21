<?php
class Activity{
    private $id;
    private $code;
    private $title;
    private $description;
    private $type;
    private $deadline;
    private $status;
    private $link;
//Constructor
    function __construct($id,$code,$title,$description,$type,$deadline,$status,$link)
    {
        $this->id=$id;
        $this->code=$code;
        $this->title=$title;
        $this->description=$description;
        $this->type=$type;
        $this->deadline=$deadline;
        $this->status=$status;
        $this->link=$link;
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