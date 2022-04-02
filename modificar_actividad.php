<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar clase</title>
</head>
<body class="fondo1 centrar">
    <!--Botón para volver a la página anterior-->
    <a href="Administrar_actividad.php" class="boton_naranja boton letra_mediana izquierda">Atrás</a>
    <!--Título de la página-->   
        <?php foreach($data["modificar_actividad"] as $fila){ ?>
    <h1 class="letra_grande inline_block">Modificar Actividad <?php echo $fila["code"];?></h1>
    <!--Formulario-->
    <form action="procesar_mod_act.php" class="formulario border letra_mediana"method="post">
        <ul class="text_left">
        <li><label>Nombre:</label></li>
        <li><input name="title" class="input border letra_pequenia" value="<?php echo $fila["title"];?>"></li>
        <li><label>Estado:</label></li>
        <li>
            <select class="select" name="status"  value="<?php echo $fila["status"];?>">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
            </select>
        </li>
        <li><label>Descripcion:</label></li>
        <li><input name="description" class="input border letra_pequenia" value="<?php echo $fila["description"];?>"></li>
        
        <li><label>Tipo de actividad:</label></li>
        <li>
            <select class="select" name="type"  value="<?php echo $fila["type"];?>">
            <option value="Activity">Actividad</option>
            <option value="Tarea">Tarea</option>
            </select>
        </li>
        <li><label>Fecha límite:</label></li>
        <li><input name="deadline" class="input border letra_pequenia" type="date" value="<?php echo $fila["deadline"];?>"></li>

        <input name="id" class="hide" value="<?php echo $fila["id"];?>">
        <li><label>Link de la actividad:</label></li>
        <input name="link" class="input border letra_pequenia" value="<?php echo $fila["link"];?>">
        </ul>
        <?php 
         }?>
        <!--Botón de enviar-->
        <input type="submit" value="Modificar Actividad" class="boton boton_naranja centrar letra_mediana">
    </form>
</body>
</html>