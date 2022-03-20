<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
$var_1="SELECT course.code FROM user INNER JOIN surrogate_keys.document ON user.documentid = document.id INNER JOIN user_course ON user_course.Userid = user.id INNER JOIN course ON course.id = user_course.Courseid WHERE num_doc = $num_doc AND acronym_doc = '$name_doc';";
//Se saca y alamacenan los valores de la ficha en un array.
$db = new Database();
$query1 = $db->connect()->prepare($var_1);
$query1->execute();

?>            
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylesb.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases Estudiante</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Clases Estudiante</h1>
    </header>
    <!--Menú de Clases Estudiante-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
            <li><a href="perfil_estudiante.php" class="boton boton_naranja2">Mi perfil</a></li>
            <li><a href="clases_estudiante.php" class="boton_naranja2  boton">Clases</a></li>
            <li><a href="cronograma_general_estudiante.php" class="boton_naranja2  boton">Cronograma</a></li>
            <li><a href="Quejas_pet_estudiante.php" class="boton_naranja2  boton">Quejas y peticiones</a></li>
<!--             <li><a href="nombredoc.html" class="boton_naranja2  boton">Añadir clase</a></li> -->
            <li><a href="iniciar_sesion.php?cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
            </ul>
    </nav>
<!--Información de Clases Estudiante-->
<article  class="inline_block cont_cla-est">
<div id="tabla1-cl-est">
    <table id="tabla-cl-es">
        <tbody id="clase-cl-es-ul">
        <main  class="inline_block cont_info_perfil">
    <?php     
            $query1 = $db->connect()->prepare($var_1);
            $query1->execute();
                while ($fila = $query1->fetch(PDO::FETCH_ASSOC)){
                    //Se hace la consulta para averiguar
                    $course= $fila["code"];
                    $var_2="SELECT names, surname,`class`.`code`,class.id, program_name FROM surrogate_keys.user  
                    INNER JOIN surrogate_keys.document ON user.documentid = document.id 
                    INNER JOIN surrogate_keys.user_class ON user_class.Userid = user.id 
                    INNER JOIN surrogate_keys.class ON user_class.classid = class.id 
                    INNER JOIN surrogate_keys.course_class ON class.id= course_class.id_class
                    INNER JOIN surrogate_keys.course ON course_class.id_course = course.id
                    INNER JOIN surrogate_keys.mode ON course.Modeid = mode.id  
                    WHERE `course`.`code`=$course;";
                    //echo($fila["code"]);
                $db = new Database();
                        $query = $db->connect()->prepare($var_2);
                        $query->execute();
                 while ($fila = $query->fetch(PDO::FETCH_ASSOC)){

?>
       
        <ul class="inline_block letra_mediana info_perfil">
        <li><span class="negrilla">Clase </span><?php echo $fila["id"];?></li>
            <li><span class="negrilla">Nombre Profesor:</span><?php echo $fila["names"];?></li>
            <li><span class="negrilla">Apellido Profesor:</span><?php echo $fila["surname"];?></li>
            <li><span class="negrilla">Materia:</span><?php echo $fila["program_name"];?></li>
            <li style="height: 70px;"></li>
            <a href="nombredoc.html" class="button">Entrar</a>
        </ul>
        <?php 
            }
            }?>
        </tbody>
    </table>
</div>


</article>