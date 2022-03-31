<?php
include 'database.php';

$title = $_POST['title'];
$description = $_POST['description'];
$type = $_POST['type'];
$deadline = $_POST['deadline'];
$link = $_POST['link'];


//('$title','$description','$type', '$deadline' )");  
//$id_doc = "";
//Verificar que las contraseñas coincida
//if($password == $password_two){
    //
//    $db2 = new Database();
//    $query2 = $db2->connect()->prepare("SELECT MIN(document.id) as id_do FROM surrogate_keys.document WHERE acronym_doc= '$tipo_doc'");    
//    $query2->execute();
//    $row = $query2->fetch(PDO::FETCH_ASSOC);

$db = new Database();
//Insertar
//SELECT MIN(document.id) FROM surrogate_keys.document WHERE acronym_doc= TI
                                                                   
    $query = $db->connect()->prepare("INSERT INTO activity (id, title, description, type, deadline, status, link, classid, Yearid, code) 
    VALUES (NULL,'$title','$description','$type', '$deadline', 'activo', '$link', '4', '4', RAND()*(9999 - 0000)+1);");  
    $query->execute();       
//    echo"<script>alert('Se creó el usuario correctamente'); window.history.go(-1);</script>";
//}else{
    //echo"<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
    if($query){
        echo"<script>alert('El mensaje se eliminó correctamente'); window.history.go(-1);</script>";
        header("Location: Administrar_actividad.php");
    }
?>