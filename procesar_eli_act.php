<?php
include ("database.php");
$id =$_GET['id'];

//Eliminar mensaje solamente de un lado
$eliminar_activ = "DELETE activity FROM activity WHERE activity.id = '$id'";
$db_msg = new Database();
$query_msg = $db_msg->connect()->prepare($eliminar_activ);    
$query_msg->execute();
if($query_msg){
    echo"<script>alert('La actividad se eliminó correctamente'); window.history.go(-1);</script>";
    header("Location: Administrar_actividad.php");
}else{
    echo"<script>alert('No se pudo eliminar la actividad'); window.history.go(-1);</script>";
}
?>