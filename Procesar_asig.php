<?php
include 'database.php';
$tipo_doc = $_POST['tipo_doc'];
$num_doc = $_POST['num_doc'];
$course = $_POST['course'];
//Se saca id ficha
$db_fic = new Database();
$query_fic = $db_fic->connect()->prepare("SELECT MIN(course.id) as id_cour FROM surrogate_keys.course WHERE code= $course");    
$query_fic->execute();
$row_fic = $query_fic->fetch(PDO::FETCH_ASSOC);
$id_fic = $row_fic['id_cour'];
echo $row_fic['id_cour'];
//Se saca id del usuario
$db_us = new Database();
$query_us = $db_us->connect()->prepare("SELECT MIN(user.id) as id_us FROM surrogate_keys.user INNER JOIN surrogate_keys.document
                                        ON user.documentid = document.id WHERE num_doc=$num_doc AND acronym_doc='$tipo_doc'");    
$query_us->execute();
$row_us = $query_us->fetch(PDO::FETCH_ASSOC);
$id_us = $row_us['id_us'];
echo $row_us['id_us'];

$db = new Database();
//Insertar
//SELECT MIN(document.id) FROM surrogate_keys.document WHERE acronym_doc= TI
$query = $db->connect()->prepare("INSERT INTO surrogate_keys.user_course
                                (Userid
                                ,Courseid)
                                 VALUES
                                ($id_us
                                ,$id_fic)");  
$query->execute();       
echo"<script>alert('Se asignó la ficha correctamente'); window.history.go(-1);</script>";
?>