<?php
include ("database.php");
$Userid =$_GET['id'];

//Eliminar mensaje solamente de un lado
$eliminar_mens = "DELETE FROM `user_message` WHERE situation = 'Recibido' AND Userid = $Userid";
$db_msg = new Database();
$query_msg = $db_msg->connect()->prepare($eliminar_mens);    
$query_msg->execute();
if($query_msg){
    echo"<script>alert('El mensaje se eliminó correctamente'); window.history.go(-1);</script>";
}else{
    echo"<script>alert('No se pudo eliminar el mensaje'); window.history.go(-1);</script>";
}
?>