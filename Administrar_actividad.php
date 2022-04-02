
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/admin_acts_styles.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar actividades</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png">
    <h1 class="inline_block letra_grande">Administrar actividades</h1>
    </header>
    <!--Menú de Cronograma-->
        <ul class="contenedor-lista-botones">
        <li class="lista-botns"><a href="#" class="boton_naranja2 boton botn-izq">Atrás</a></li>
        <li class="lista-botns lista-dos"><a href="#" class="boton_naranja2 boton botn-der">Añadir actividad</a></li>
        </ul>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil_admin">
        <table id="tabla">
            <tbody>
                <tr>
                    <th colspan="1"><strong>CÓDIGO</strong></th>
                    <th colspan="1"><strong>FECHA</strong></th>
                    <th colspan="1"><strong>ACTIVIDAD</strong></th>
                    <th colspan="1"><strong>ESTADO</strong></th>
                    <th colspan="1"><strong>ELIMINAR</strong></th>
                    <th colspan="1"><strong>MODIFICAR</strong></th>
                    <th colspan="1"><strong>CALIFICAR</strong></th>
                 </tr>
                 <?php foreach($data["actividad_administrar"] as $dato){ ?>                 
                <tr>
                    <td class="obj_tabl"><?php echo $dato["code"];?></td>
                    <td class="obj_tabl"><?php echo $dato["deadline"];?></td>
                    <td class="act_tabl"><?php echo $dato["title"];?></td>
                    <td class="estad_tabl"><?php echo $dato["status"];?></td>
                    <td class="obj_tabl"><a href="#?id=<?php echo $dato["id"];?>" class="act_del">Eliminar</a></td>
                    <td class="obj_tabl"><a href="#?id=<?php echo $dato["id"];?>" class="act_mod">Modificar</a></td>
                    <td class="obj_tabl"><a href="#?id=<?php echo $dato["id"];?>" class="act_cal">Calificar</a></td>
                
                <tr>
                <?php 
                }?>
<!--         
            echo "<td class="obj_tabl">". $row["code"]."</td>";
            echo "<td class="obj_tabl">". $row["deadline"]."</td>";
            echo "<td class="act_tabl">". $row["title"]."</td>";
            echo "<td class="estad_tabl">" .$row["status"]."</td>";
            echo "<td class="obj_tabl">". $row["id"]."<a class="act_del">Eliminar</a></td>";
            echo "<td class="obj_tabl">". $row["id"]."<a class="act_mod">Modificar</a></td>";
            echo "<td class="obj_tabl">". $row["id"]."<a class="act_cal">Calificar</a></td>"; -->

            </tbody>
        </table>
    </main>
    <script src= "eli_act.js"></script>
</body>
</html>