<?php
include ("database.php");
$Userid =$_GET['id'];

//Eliminar mensaje solamente de un lado
$eliminar_mens_remitente = "DELETE user_message FROM user_message WHERE user_message.Userid = '$Userid'";
$db_msg = new Database();
$query_msg = $db_msg->connect()->prepare($eliminar_mens_remitente);    
$query_msg->execute();
if($query_msg){
    echo"<script>alert('El mensaje se eliminó correctamente'); window.history.go(-1);</script>";
    header("Location: Quejas_peticiones.php");
}else{
    echo"<script>alert('No se pudo eliminar el mensaje'); window.history.go(-1);</script>";
}
?>