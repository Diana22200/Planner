<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/styles_clase1.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificar Actividad</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png">
    <h1 class="inline_block letra_grande">Calificar Actividades</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="#" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="#" class="boton_naranja2  boton">Añadir Actividad</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr>
                    <th colspan="1"><strong>TÍTULO</strong></th>
                    <th colspan="1"><strong>NOMBRE APRENDIZ</strong></th>
                    <th colspan="1"><strong>APELLIDO APRENDIZ</strong></th>
                    <th colspan="1"><strong>NOTA</strong></th>
                    <th colspan="1"><strong>CALIFICAR</strong></th>
                </tr>
                <!-- < foreach($data["actividad_calf"] as $dato){ 
                echo "<tr>"
                echo    "<td class="obj_tabl">".$dato["Userid"]."</td>";
                echo    "<td class="obj_tabl">".$dato["Activityid"]."</td>";
                echo    "<td class="obj_tabl">".$dato["names"]."</td>";
                echo    "<td class="obj_tabl">".$dato["surname"]."</td>";
                echo    "<td class="obj_tabl">".$dato["score"]."</td>";
                echo   "<td class="obj_tabl"><a class="act_cal" href='index.php?c=actividad_Controller&a=modif_act'>Calificar</a>".$dato["Userid"]."</td>";
                echo "</tr>"
                } -->

                <?php foreach($data["actividad_calf"] as $dato){ ?>
                <tr>
                    <td class="obj_tabl"><?php echo $dato["title"] ?></td>
                    <td class="obj2_tabl"><?php echo $dato["surname"] ?></td>
                    <td class="obj2_tabl"><?php echo $dato["names"] ?></td>
                    <td class="obj_tabl"><?php echo $dato["score"] ?></td>
                    <td class="obj_tabl"><a href="#?id=<?php echo $dato["title"] ?>" class="message_del">Calificar</a></td>
                </tr>
                <?php 
                }?>
            </tbody>
        </table>
    </main>
</body>
</html>