<?php
include 'database.php';
$actividades = "SELECT code, deadline, title, status, id FROM activity";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/stylosquejas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar actividades</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png" width="90px">
    <h1 class="inline_block letra_grande">Administrar actividades</h1>
    </header>
    <!--Menú de Cronograma-->
        <ul class="contenedor-lista-botones">
        <li class="lista-botns"><a href="#" class="boton_naranja2 boton botn-izq">Atrás</a></li>
        <li class="lista-botns lista-dos"><a href="añadir_actividad.php" class="boton_naranja2 boton botn-der">Añadir actividad</a></li>
        </ul>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil_admin">
        <table id="tabla">
            <tbody>
                <tr>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>CÓDIGO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>FECHA</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ACTIVIDAD</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ESTADO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ELIMINAR</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>MODIFICAR</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>CALIFICAR</strong></th>
                 </tr>
                 <?php    $db = new Database();
                        $query = $db->connect()->prepare($actividades);    
                        $query->execute();
                 while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                 ?>

            <tr>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $row["code"];?></td>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $row["deadline"];?></td>
                <td width="350px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $row["title"];?></td>
                <td width="200px" style="padding: 6px; text-align: center; padding: 15px;"><?php echo $row["status"];?></td>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><a href="procesar_eli_act.php?id=<?php echo $row["id"];?>" class="act_del">Eliminar</a></td>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><a href="---?id=<?php echo $row["id"];?>" class="act_mod">Modificar</a></td>
                <td width="150px" style="padding: 6px; text-align: center; padding: 15px;"><a href="---?id=<?php echo $row["id"];?>" class="act_cal">Calificar</a></td>
            
            <tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <script src= "eli_act.js"></script>
</body>
</html>