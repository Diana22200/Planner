<?php

$server="localhost";
$database="surrogate_keys";
$user="root";
$pass="";
$conexion=new mysqli($server, $user, $pass, $database);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylosquejas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quejas y peticiones</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png" style="width:7%; height:70px;">
    <h1 class="inline_block letra_grande">Quejas y peticiones</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="Quejas_peticiones.php" class="boton_naranja2  boton">Bandeja de entrada</a>
          <li><a href="" class="boton_naranja2  boton">Bandeja de salida</a>
            <li><a href="Enviar_mensaje.php" class="boton_naranja2  boton">Enviar mensaje</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
    <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ID</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>FECHA</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ASUNTO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>REMITENTE</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ELIMINAR</strong></th>
                    
                 </tr>

                <?php
                    $sql="SELECT m.id, m.shipping_date, m.title, s.situation FROM message m JOIN user_message s ON s.Userid = m.id WHERE s.situation = 'Enviado';";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                ?>


            <tr>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["id"] ?></td>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["shipping_date"] ?></td>
                <td width="350px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["title"] ?></td>
                <td width="200px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $mostrar["situation"] ?></td>
                <td style="padding: 6px; text-align: center;"><a href="eliminar.php?id=<?php echo $mostrar["id"] ?>" class="message_del">Eliminar</a></td>
        
                <?php
                    }
                                      
                    
                ?>
            </tbody>
        </table>
    </main>
    <script src="del_message_conf.js"></script>
</body>
</html>