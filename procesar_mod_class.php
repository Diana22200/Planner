<?php
include_once ("database.php");
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
$materia = $_POST['materia'];
$ficha = $_POST['ficha'];
$ficha_actu = $_POST['ficha_actu'];
$status = $_POST['status'];
$id =$_POST['id'];
$db = new Database();
//Traer el id de la ficha nueva
$query3 = $db->connect()->prepare("SELECT MIN(id) as id_f FROM course WHERE code=$ficha");    
$query3->execute();
$row = $query3->fetch(PDO::FETCH_ASSOC);
$id_ficha = $row['id_f'];
//Traer el id de la ficha actual
$query5 = $db->connect()->prepare("SELECT MIN(id) as id_fac FROM course WHERE code=$ficha_actu");    
$query5->execute();
$row = $query5->fetch(PDO::FETCH_ASSOC);
$id_ficha_ac = $row['id_fac'];
//Traer el id de class_course
$query4 = $db->connect()->prepare("SELECT MIN(id) as id_cc FROM course_class WHERE id_course=$id_ficha_ac AND id_class=$id");    
$query4->execute();
$row = $query4->fetch(PDO::FETCH_ASSOC);
$id_cc = $row['id_cc'];
//modificación de Clase
$query1 = $db->connect()->prepare("UPDATE class SET subject='$materia',status='$status' WHERE id=$id");    
$query1->execute();
//Actualizar el class_course
$mod_us_class="UPDATE `course_class` SET `id_course`='$id_ficha' WHERE id=$id_cc";
$query = $db->connect()->prepare($mod_us_class);    
$query->execute();

if($query){
    echo"<script>alert('Se modifico la clase correctamente'); window.history.go(-2);</script>";
}else{
    echo"<script>alert('No se pudo modificar la clase.'); window.history.go(-1);</script>";
}

?>