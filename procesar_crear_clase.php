<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
$name = $_POST['materia'];
$name = $_POST['course'];
//Variable de número al azar
$d=rand(1000,9999); 
    //Sentencias
    $codigo="SELECT code from class where code = 5530";

    $db = new Database();
    $query2 = $db2->connect()->prepare("SELECT MIN(document.id) as id_do FROM surrogate_keys.document WHERE acronym_doc= '$tipo_doc'");    
    $query2->execute();
    $row = $query2->fetch(PDO::FETCH_ASSOC);
    $id_doc = $row['id_do'];
echo $row['id_do'];
//Insertar
//SELECT MIN(document.id) FROM surrogate_keys.document WHERE acronym_doc= TI
    $query = $db->connect()->prepare("INSERT INTO surrogate_keys.user(num_doc,documentid,status,names,surname,url_prof_pic,email,password,Roleid)
                        VALUES ('$num_doc', $id_doc, 'Activo', '$name', '$surname',
                        'https://www.onusanmiguel.com/wp-content/uploads/2021/04/unnamed.jpg'
                        , '$email', '$password', '$roleid')");  
    $query->execute();       
    echo"<script>alert('Se creó el usuario correctamente'); window.history.go(-1);</script>";
    echo"<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
?>
?>