<?php
include_once ("database.php");
$names = $_POST['names'];
$surname = $_POST['surname'];
$tipo_doc = $_POST['acronym_doc'];
$status = $_POST['status'];
$num_doc = $_POST['num_doc'];
$id =$_POST['id'];

//Conseguir id del documento
$db2 = new Database();
$query2 = $db2->connect()->prepare("SELECT MIN(document.id) as id_do FROM surrogate_keys.document WHERE acronym_doc= '$tipo_doc'");    
$query2->execute();
$row = $query2->fetch(PDO::FETCH_ASSOC);
$id_doc = $row['id_do'];
echo $row['id_do'];


//Modificar usuario
$mod_us = "UPDATE surrogate_keys.user SET num_doc = $num_doc, documentid = $id_doc, status = '$status', names = '$names', surname = '$surname' WHERE id = $id";

$db = new Database();
$query = $db->connect()->prepare($mod_us);    
$query->execute();

if($query){
    echo"<script>alert('Se añadió al administrador correctamente'); window.history.go(-1);</script>";
    header:location:
}else{
    echo"<script>alert('No se pudo actualizar el registro.'); window.history.go(-1);</script>";
}
?>