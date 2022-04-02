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
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png">
    <h1 class="inline_block letra_grande">Quejas y peticiones</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="perfil_instructor.php" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="" class="boton_naranja2  boton">Bandeja de entrada</a>
          <li><a href="Quejas_peticiones_remitente.php" class="boton_naranja2  boton">Bandeja de salida</a>
            <li><a href="Enviar_mensaje.php" class="boton_naranja2  boton">Enviar mensaje</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr>
                    <th colspan="1"><strong>ID</strong></th>
                    <th colspan="1"><strong>FECHA</strong></th>
                    <th colspan="1"><strong>ASUNTO</strong></th>
                    <th colspan="1"><strong>DESTINATARIO</strong></th>
                    <th colspan="1"><strong>ELIMINAR</strong></th>
                </tr>
                <tr>
                    <td class="obj_tabl"><?php echo $row["Userid"] ?></td>
                    <td class="obj_tabl"><?php echo $row["shipping_date"] ?></td>
                    <td class="obj3_tabl"><?php echo $row["title"] ?></td>
                    <td class="obj2_tabl"><?php echo $row["situation"] ?></td>
                    <td class="obj_tabl"><a class="act_cal" href="---?id=<?php echo $row["id"];?>">Calificar</a></td>
                </tr>
            <!-- echo "<td class="obj_tabl">". $row["Userid"]."</td>";
                    echo "<td class="obj_tabl">". $row["shipping_date"]."</td>";
                    echo "<td class="obj3_tabl">". $row["title"]."</td>";
                    echo "<td class="obj2_tabl">" .$row["situation"]."</td>";
                    echo "<td class="obj_tabl">". $row["id"]."<a class="message_del">Eliminar</a></td>"; -->
            </tbody>
        </table>
    </main>
    <script src="eli_mensaje.js"></script>
</body>
</html>
