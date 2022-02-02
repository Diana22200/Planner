<?php
include ("database.php");
$id =$_GET['id'];

//Eliminar mensaje solamente de un lado
$eliminar_msg = "DELETE user_message FROM user_message WHERE user_message.messageid = '$id' AND user_message.situation = 'Recibido'";
$db_msg = new Database();
$query_msg = $db_msg->connect()->prepare($eliminar_msg);    
$query_msg->execute();
if($query_msg){
    echo"<script>alert('El usuario se eliminó correctamente'); window.history.go(-1);</script>";
    header("Location: Quejas_pet_admin.php");
}else{
    echo"<script>alert('No se pudo eliminar el mensaje'); window.history.go(-1);</script>";
}
?>