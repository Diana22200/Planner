<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
$materia = $_POST['materia'];
$ficha = $_POST['course'];
//Variable de número al azar
$random=rand(1000,9999); 
    //Sentencias
    $db = new Database();
    $codigo="SELECT code from class where code = $random";
    //Traer el id de la ficha
    $query3 = $db->connect()->prepare("SELECT MIN(id) as id_f FROM course WHERE code=$ficha");    
    $query3->execute();
    $row = $query3->fetch(PDO::FETCH_ASSOC);
    $id_ficha = $row['id_f'];
    echo $row['id_f'];
    //Traer el id del usuario
    $query2 = $db->connect()->prepare("SELECT MIN(user.id) as id_us FROM surrogate_keys.user 
    INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'");    
    $query2->execute();
    $row = $query2->fetch(PDO::FETCH_ASSOC);
    $id_user = $row['id_us'];
    echo $row['id_us'];
//Insertar
//SELECT MIN(document.id) FROM surrogate_keys.document WHERE acronym_doc= TI
    $query = $db->connect()->prepare("INSERT INTO class(id, code, subject, status) 
                                        VALUES ('','$random','$materia','Activo')");
    $query->execute();    
    //Tomar el id de la clase
    $query4 = $db->connect()->prepare("SELECT MIN(class.id) as id_class FROM surrogate_keys.class WHERE code = $random");    
    $query4->execute();
    $row = $query4->fetch(PDO::FETCH_ASSOC);
    $class_id = $row['id_class'];
    echo $row['id_class'];
    //Insertar segunda parte
    $query5 = $db->connect()->prepare("INSERT INTO user_class(id, Userid, classid) 
                                    VALUES ('','$id_user',$class_id)
                                    ");
    $query5->execute();    

    $query6 = $db->connect()->prepare("INSERT INTO course_class(id, id_class, id_course) 
    VALUES ('',$class_id,'$id_ficha')");   
    $query6->execute();    
  
    echo"<script>alert('Se Añadió la clase correctamente'); window.history.go(-1);</script>";
    echo"<script>alert('Algo salió mal. Por favor intente de nuevo'); window.history.go(-1);</script>";
?>
?>