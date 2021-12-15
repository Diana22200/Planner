<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
    $admin = "SELECT names, surname, email, url_prof_pic FROM surrogate_keys.user 
    INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'";    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylesb.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Administrador</title>
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
        <li><a href="perfil_estudiante.html" class="boton boton_naranja2">Mi perfil</a></li>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Clases</a></li>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Cronograma</a></li>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Quejas y peticiones</a></li>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Añadir clase</a></li>
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
            <li><span class="negrilla">Nombre:</span><?php echo $fila["names"];?></li>
            <li><span class="negrilla">Apellido:</span><?php echo $fila["surname"];?></li>
            <li><span class="negrilla">Correo:</span><?php echo $fila["email"];?></li>
            <li><span class="negrilla">Número de documento:</span><?php echo $_SESSION['numero_docu'];?></li>
            <li><span class="negrilla">Tipo de documento:</span><?php echo $_SESSION['tipo_docu'];?></li>
            <li><a href="nombredoc.html" class="link">Cambiar Datos</a></li>
        </ul>
        <?php 
            }?>
    </main>
</body>
</html>