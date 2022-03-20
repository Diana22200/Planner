<?php
include_once 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
    //$admin = "SELECT names, surname, url_prof_pic, email, code, trimestre, session_time, education_level/*, program_name*/ FROM surrogate_keys.user  INNER JOIN surrogate_keys.document ON user.documentid = document.id INNER JOIN  surrogate_keys.user_course ON user_course.Userid = user.id INNER JOIN  surrogate_keys.course ON user_course.courseid = course.id INNER JOIN  surrogate_keys.mode ON course.Modeid = mode.id  WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'";    
$stu= "SELECT user.id, names, surname, email, url_prof_pic FROM surrogate_keys.user 
INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'";    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis clases</title>
</head>
<body class="fondo2 centrar">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Modificar información</h1>
    </header>
    <!--Botón para volver a la página anterior-->    
    <a href="perfil_estudiante.php" class="atras border boton letra_mediana izquierda2">Atrás</a>
    <!--Formulario-->
    <!--HACER UNA VALIDACIÓN DEL FORMULARIO PARA QUE NO SE MODIFIQUE SI NO COINCIDEN LAS CONTRASEÑAS-->
    <form class="formulario border letra_mediana" action="procesar_mod_info.php" method="POST">
    <?php     $db = new Database();
                        $query = $db->connect()->prepare($stu);    
                        $query->execute();
                 while ($fila = $query->fetch(PDO::FETCH_ASSOC)){

?>
        <ul class="text_left">
        <li><label>Nombre:</label></li>
        <li><input name="names" class="input border letra_pequenia" value=<?php echo $fila["names"];?>></li>
        <li><label>Apellidos:</label></li>
        <li><input name="surname" class="input border letra_pequenia" value=<?php echo $fila["surname"];?>></li>
        <li><label>Email:</label></li>
        <li><input name="email" class="input border letra_pequenia" value=<?php echo $fila["email"];?>></li>
        <li><label>Foto de perfil URL:</label></li>
        <li><input name="url_prof_pic" class="input border letra_pequenia" value=<?php echo $fila["url_prof_pic"];?>></li>
        <input name="id" class="hide" value="<?php echo $fila["id"];?>">
        <!--Hacer que si la contraseña-->
        <div>Contraseña actual: <input class="input border letra_pequenia" name="password" type="password" placeholder="Ingrese su contraseña actual"></div>
        <div>Contraseña nueva: <input class="input border letra_pequenia" name="password" type="password" placeholder="Ingrese contraseña"></div>
        <div>Confirmar contraseña: <input class="input border letra_pequenia" name="password_two" type="password" placeholder="Ingrese nuevamente contraseña"></div>
        <li>
        </ul>
        <input type="submit" value="Cambiar datos" class="boton boton_naranja centrar letra_mediana">
        <?php 
            }?>
    </form>
</main>
</body>
</html>