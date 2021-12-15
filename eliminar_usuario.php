<?php
include 'database.php';
$usuarios = "SELECT acronym_doc, num_doc, names, surname, user.id, type FROM user INNER JOIN document ON user.documentid = document.id INNER JOIN surrogate_keys.role ON role.id = user.Roleid  ";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style_elimi.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuario</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png" width="90px">
    <h1 class="inline_block letra_grande">Eliminar Usuario</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
            <!--Aquí debe ir el menú de perfil administrador!!!!-->
        <ul>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="nombredoc.html" class="boton_naranja2  boton">Eliminar actividad</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>TIPO DOC</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>NUM DOC</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>NOMBRE</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>APELLIDO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ROL</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ELIMINAR</strong></th>
                 </tr>
                 <?php    $db = new Database();
                        $query = $db->connect()->prepare($usuarios);    
                        $query->execute();
                 while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                 ?>
            <tr>
                <td width="150px" style="padding: 6px; text-align: center;"><?php echo $row["acronym_doc"];?></td>
                <td width="150px" style="padding: 6px; text-align: center;"><?php echo $row["num_doc"];?></td>
                <td width="150px" style="padding: 6px; text-align: center;"><?php echo $row["names"];?></td>
                <td width="150px" style="padding: 6px; text-align: center;"><?php echo $row["surname"];?></td>
                <td width="150px" style="padding: 6px; text-align: center;"><?php echo $row["type"];?></td>
                <td width="150px" style="padding: 6px; text-align: center;"><a href="procesar_eli_us.php?id=<?php echo $row["id"];?>" class="table_del">Eliminar</a></td>
            </tr>
            <?php 
            }?>
            </tbody>
        </table>
    </main>
    <script src= "eli_usuario_conf.js"></script>
</body>
</html>