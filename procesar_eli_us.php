<?php
include ("database.php");
$id =$_GET['id'];


//Eliminar mensaje
$eliminar_msg = "DELETE user_message FROM user_message WHERE user_message.Userid = '$id'";


$db_msg = new Database();
$query_msg = $db_msg->connect()->prepare($eliminar_msg);    
$query_msg->execute();
//Eliminar usuario_mensaje
$eliminar_us_msg = "DELETE user_class FROM user_class WHERE user_class.Userid = '$id'";


$db_us_msg = new Database();
$query_us_msg = $db_us_msg->connect()->prepare($eliminar_us_msg);    
$query_us_msg->execute();

//Eliminar Ficha
$eliminar_course = "DELETE user_course FROM user_course WHERE user_course.Userid = '$id'";

$db_cour = new Database();
$query_cour = $db_cour->connect()->prepare($eliminar_course);    
$query_cour->execute();


//Eliminar calificaciones
$eliminar_cal = "DELETE qualification FROM qualification WHERE qualification.Userid = '$id'";

$db_cal = new Database();
$query_cal = $db_cal->connect()->prepare($eliminar_cal);    
$query_cal->execute();


//Eliminar usuario
$eliminar_us = " DELETE user FROM user WHERE user.id = '$id'";

$db_us = new Database();
$query_us = $db_us->connect()->prepare($eliminar_us);    
$query_us->execute();

if($query_us){
    echo"<script>alert('El usuario se eliminó correctamente'); window.history.go(-1);</script>";
    header("Location: eliminar_usuario.php");
}else{
    echo"<script>alert('No se pudo eliminar el usuario'); window.history.go(-1);</script>";
}
?>