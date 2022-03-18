<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
//Consulta SQL
$sql1="SELECT class.code, names, surname, subject FROM user 
INNER JOIN surrogate_keys.document ON user.documentid = document.id 
INNER JOIN user_class ON user_class.Userid = user.id 
INNER JOIN class ON class.id = user_class.Classid 
WHERE num_doc = $num_doc AND acronym_doc = '$name_doc';";

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
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Mis clases</h1>
    </header>
    <!--Menú de navegación instructor-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
            <li><a href="perfil_instructor.php" class="boton boton_naranja2">Mi perfil</a></li>
            <li><a href="clases_instructor.html" class="boton_naranja2  boton">Clases</a></li>
            <li><a href="cronograma_general_instructor.php" class="boton_naranja2  boton">Cronograma</a></li>
            <li><a href="Quejas_peticiones_remitente.php" class="boton_naranja2  boton">Quejas y peticiones</a></li>
            <li><a href="añadir_clase_instructor.html" class="boton_naranja2  boton">Añadir clase</a></li>
            <li><a href="iniciar_sesion.php?cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
        </ul>
    </nav>
    <!--Contenido principal de las clases en el perfil instructor-->
    <main  class="cont_clases">

    <!--Clase 1-->
    <?php     
        $db = new Database();
        $query = $db->connect()->prepare($sql1);    
        $query->execute();
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)){

    ?>
     
        <div class="clase centrar ">
        <h2 class="border clase_titulo">Clase 1</h2>
        <ul>
        <li><span class="negrilla">Nombre: </span><?php echo $fila["names"];?></li>
        <li><span class="negrilla">Apellido:</span><?php echo $fila["surname"];?></li>
        <li><span class="negrilla">Código para unirse:</span><?php echo $fila["code"];?></li>
        <li><span class="negrilla">Materia:</span><?php echo $fila["subject"];?></li>
        </ul>
        <a href="nombredoc.html" class="boton_pequenio boton letra_mediana">Entrar</a>
        </div>
        <?php 
            }?>
    </main>
</body>
</html>