<?php
include 'database.php';
$name = $_POST['name'];
$surname = $_POST['surname'];
$type_role= $_POST['type_role'];
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
                        , '$email', '$password', 1)");  
    $query->execute();       
    echo"<script>alert('Se añadió al administrador correctamente'); window.history.go(-1);</script>";
}else{
    echo"<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS\styleinicio.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <a href="">Atrás</a>
    <h2>Registrarse</h2>
    <form action="registrarse.php" method="post">
        <section class="tabla">
            <p>Nombres:
                <div><input class="espacio" type="text" placeholder="Ingrese nombres"></div></p>
                <p>Apellidos:
                    <div><input class="espacio" type="text" placeholder="Ingrese apellidos"></div></p>
            <p>Tipo de cuenta:
                <div><select class="select" name="name" id="">
                    <option value="valor">Estudiante</option>
                    <option value="valor">Instructor</option>
                </select></div>
            </p>
            <p>Tipo de documento:
                <div><select class="select" name="name" id="">
                    <option value="valor">Cedula de ciudadania</option>
                    <option value="valor">Tarjeta de identidad</option>
                    <option value="valor">Cedula de extranjeria</option>
                </select></div>
            </p>
            <p>Número de documento:
                <div><input class="espacio" type="text" placeholder="Número de documento"></div></p>
            <p>Email
                <div><input class="espacio" type="text" placeholder="Correo misena"></div></p>
            <p>Contraseña:
                <div>
                    <input class="espacio" type="password" placeholder="Ingrese contraseña">
                </div>
                <p>Confirmar contraseña:
                    <div>
                        <input class="espacio" type="password" placeholder="Confirmar contraseña">
                    </div>
            </p>
           <input class="button" type="submit" value="Registrarse"> 
        </section>
    </form>
</body>
</html>