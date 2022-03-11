<?php

$server="localhost";
$database="surrogate_keys";
$user="root";
$pass="";
$conexion=new mysqli($server, $user, $pass, $database);
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylosclase1.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 1</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png" style="width:7%; height:70px;">
    <h1 class="inline_block letra_grande">Clase 1</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Ver actividades</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>CÓDIGO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>FECHA</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ACTIVIDAD</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ESTADO</strong></th>
                    
                 </tr>

                 <?php
                    $sql="SELECT code, deadline, title, status FROM `activity`;";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                ?>
                
                <tr>
                <td width="210px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["code"] ?></td>
                <td width="210px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["deadline"] ?></td>
                <td width="210px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["title"] ?></td>
                <td width="210px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["status"] ?></td>
                </tr>
                
                <?php
                    }
                ?>

            </tbody>
        </table>
    </main>
</body>
</html>