<?php
include_once ("database.php");
$names = $_POST['names'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$url_prof_pic = $_POST['url_prof_pic'];
$id =$_POST['id'];


//Modificar usuario
$mod_us = "UPDATE surrogate_keys.user SET names = '$names', surname = '$surname', email = '$email', url_prof_pic = '$url_prof_pic' WHERE id = $id";

$db = new Database();
$query = $db->connect()->prepare($mod_us);    
$query->execute();

if($query){
    echo"<script>alert('Se modifico el usuario correctamente'); window.history.go(-2);</script>";
    header:location:
}else{
    echo"<script>alert('No se pudo modificar el registro.'); window.history.go(-1);</script>";
}
?>