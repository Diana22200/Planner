<?php
include_once 'database.php';
session_start();

if(isset($_GET['cerrar_sesion'])){
session_unset();

session_destroy();
header('location:iniciar_sesion.php');

}



if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        //administrador
        case 1:
            header('location:perfil_admin.php');
        break;
        //Aprendiz
        case 2:
            header('location:perfil_estudiante.php');

        break;
        //Instructor
        case 3:
            header('location:perfil_instructor.html');
        break;
        default:
    }
}

if(isset($_POST['tipo_doc']) && isset($_POST['num_doc'])&& isset($_POST['password'])){
    $tipo_doc = $_POST['tipo_doc'];
    $num_doc = $_POST['num_doc'];
    $password = $_POST['password'];
    $_SESSION['numero_docu']=$_POST['num_doc'];
    $_SESSION['tipo_docu'] =$_POST['tipo_doc'];
    $db = new Database();
    $query = $db->connect()->prepare('SELECT * FROM user INNER JOIN document ON user.documentid = document.id INNER JOIN role ON role.id = user.Roleid WHERE user.num_doc = :num_doc AND user.password = :password AND document.acronym_doc = :tipo_doc ');    $query->execute(['tipo_doc' => $tipo_doc, 'num_doc' => $num_doc, 'password' => $password]);
    $row = $query->fetch(PDO::FETCH_NUM);
    if($row == true){
        $rol = $row[9];
        $_SESSION['rol']=$rol;
        
        switch($_SESSION['rol']){
            //administrador
            case 1:
                header('location:perfil_admin.php');
            break;
            //Aprendiz
            case 2:
                header('location:perfil_estudiante.php');
    
            break;
            //Instructor
            case 3:
                header('location:perfil_instructor.php');
            break;
            default:
        }
    //Valida el inicio de sesión
    }else{
        echo "No se pudo ingresar. Por favor verifique los datos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="CSS/styleinicio.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inciar sesión</title>
</head>
<body>
    <!--Iniciar sesión-->
    <a class="boton_naranja" href="index.html">Atrás</a>
    <h2 class="titulo">Inicio de sesión</h2>
    <form action="#" method="POST">
        <section class="tabla">
            <p>Tipo de documento 
                <div><select class="select" name="tipo_doc" id="">
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="Pas">Pasaporte</option>
                    <option value="DNI">Documento Nacional de Identificación</option>
                    <option value="NIT">Número de Identificación Tributaria</option>
                </select></div>
            </p>

            <p>Número de documento 
                <div><input class="espacio" type="text" name="num_doc" placeholder="Número de documento"></div></p>
            <p>Contraseña 
                <div>
                <input class="espacio" type="password" name="password" placeholder="Ingrese contraseña">
                </div>
            </p>
           <input class="boton button" type="submit" value="Iniciar sesión"> 
        </section>
    </form>
</body>
</html>