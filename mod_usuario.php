<?php
include 'database.php';
$usuarios = "SELECT acronym_doc, num_doc, names, surname, user.id, type FROM user INNER JOIN document ON user.documentid = document.id INNER JOIN surrogate_keys.role ON role.id = user.Roleid  ";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/modi_style.css">
    <!-- Compiled and minified CSS -->
    

    <title>Modificar usuario</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
        <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png" width="90px">
        <h1 class="inline_block letra_grande">Modificar Usuario</h1>
        </header>
    <nav class="inline_block letra_mediana">
        <section class="inline_block">
            <div class="columna_izquierda">
            <li><a href="perfil_admin.php" class="botton">Mi perfil</a></li>
            <li><a href="eliminar_usuario.php" class="botton">Eliminar usuario</a></li>
            <li><a href="crear_admin.php" class="botton">Crear administrador</a></li>
            <li><a href="mod_usuario.php" class="botton">Modificar usuario</a></li>
            <li><a href="Quejas_pet_admin.php" class="botton">Quejas y peticiones</a></li>
            <li><a href="iniciar_sesion.php?cerrar_sesion=1" class="botton">Cerrar sesión</a></li>
            </div>
        </section>
        </nav>
    <div class="seach">
        <input class="buscar inline_block" type="search" name="" placeholder="Buscar">
        <input class="botton" type="submit" value="Asignar ficha">
    </div>
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>TIPO DOC</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>NUM DOC</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>NOMBRE</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>APELLIDO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ROL</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>MODIFICAR</strong></th>
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
                <td width="150px" style="padding: 6px; text-align: center;"><a href="actu_mod_user.php?id=<?php echo $row["id"];?>" class="table_del">Modificar</a></td>
            </tr>
            <?php 
            }?>
            </tbody>
        </table>
    </main>
</body>
</html>