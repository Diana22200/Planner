<?php
include 'database.php';
$name = $_POST['name'];
$surname = $_POST['surname'];
$roleid = $_POST['Roleid'];
$tipo_doc = $_POST['tipo_doc'];
$num_doc = $_POST['num_doc'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];
$id_doc = "";
//Verificar que las contraseñas coincida
if($password == $password_two){
    //
    $db2 = new Database();
    $query2 = $db2->connect()->prepare("SELECT MIN(document.id) as id_do FROM surrogate_keys.document WHERE acronym_doc= '$tipo_doc'");    
    $query2->execute();
    $row = $query2->fetch(PDO::FETCH_ASSOC);
    $id_doc = $row['id_do'];
echo $row['id_do'];
    $db = new Database();
//Insertar
//SELECT MIN(document.id) FROM surrogate_keys.document WHERE acronym_doc= TI
    $query = $db->connect()->prepare("INSERT INTO surrogate_keys.user(num_doc,documentid,status,names,surname,url_prof_pic,email,password,Roleid)
                        VALUES ('$num_doc', $id_doc, 'Activo', '$name', '$surname',
                        'https://www.onusanmiguel.com/wp-content/uploads/2021/04/unnamed.jpg'
                        , '$email', '$password', '$roleid')");  
    $query->execute();       
    echo"<script>alert('Se creó el usuario correctamente'); window.history.go(-1);</script>";
}else{
    echo"<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
}
?>