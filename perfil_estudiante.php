<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
    $admin = "SELECT names, surname, url_prof_pic, email, code, trimestre, session_time, education_level, program_name FROM surrogate_keys.user  INNER JOIN surrogate_keys.document ON user.documentid = document.id INNER JOIN  surrogate_keys.user_course ON user_course.Userid = user.id INNER JOIN  surrogate_keys.course ON user_course.courseid = course.id INNER JOIN  surrogate_keys.mode ON course.Modeid = mode.id  WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'";    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylesb.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Mi perfil</h1>
    </header>
    <!--Menú de navegación estudiante-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="perfil_estudiante.php" class="boton boton_naranja2">Mi perfil</a></li>
        <li><a href="clases_estudiante.html" class="boton_naranja2  boton">Clases</a></li>
        <li><a href="cronograma_general.php" class="boton_naranja2  boton">Cronograma</a></li>
        <li><a href="Quejas_pet_estudiante.php" class="boton_naranja2  boton">Quejas y peticiones</a></li>
        <li><a href="anadir_clase_estudiante.html" class="boton_naranja2  boton">Añadir clase</a></li>
        <li><a href="iniciar_sesion.php?cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
        </ul>
    </nav>
    <!--Información del perfil del estudiante-->
    <main  class="inline_block cont_info_perfil">
    <?php     $db = new Database();
                        $query = $db->connect()->prepare($admin);    
                        $query->execute();
                 while ($fila = $query->fetch(PDO::FETCH_ASSOC)){

?>
        <img alt="Foto de perfil" width="300px" class="inline_block" src="<?php echo $fila["url_prof_pic"];?>">
        <ul class="inline_block letra_mediana info_perfil">
        <li><span class="negrilla">Número de documento:</span><?php echo $_SESSION['numero_docu'];?></li>
            <li><span class="negrilla">Tipo de documento:</span><?php echo $_SESSION['tipo_docu'];?></li>
            <li><span class="negrilla">Nombre:</span><?php echo $fila["names"];?></li>
            <li><span class="negrilla">Apellido:</span><?php echo $fila["surname"];?></li>
            <li><span class="negrilla">Correo:</span><?php echo $fila["email"];?></li>
            <li><span class="negrilla">Ficha:</span><?php echo $fila["code"];?></li>
            <li><span class="negrilla">Jornada:</span><?php echo $fila["session_time"];?></li>
            <li><span class="negrilla">Nivel Educativo</span><?php echo $fila["education_level"];?></li>
            <li><span class="negrilla">Trimestre:</span><?php echo $fila["trimestre"];?></li>   
            <li><span class="negrilla">Programa de Formación:</span><?php echo $fila["program_name"];?></li>  

           
            <li><a href="nombredoc.html" class="link">Cambiar Datos</a></li>
        </ul>
        <?php 
            }?>
    </main>
</body>
</html>

