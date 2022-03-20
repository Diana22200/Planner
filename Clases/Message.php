<?php
class Message{
    private $id;
    private $text;
    private $shipping_date;
    private $title;
    private $code;
    function __construct($id,$text,$shipping_date,$title,$code){
        
        $this->id =$id;
        $this->text =$text;
        $this->shipping_date =$shipping_date;
        $this->title =$title;
        $this->code =$code;
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