<?php
include_once 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
//Se consulta el id del usuario de acuerdo a el numero y tipo de documento
$db_user = new Database();
$query_user = $db_user->connect()->prepare("SELECT MIN(user.id) as id_us FROM surrogate_keys.user INNER JOIN surrogate_keys.document 
ON user.documentid = document.id WHERE acronym_doc = '$name_doc' AND num_doc = $num_doc");    
$query_user->execute();
$row_user = $query_user->fetch(PDO::FETCH_ASSOC);
$id_user = $row_user['id_us'];

$usuarios = "SELECT message.id, message.code, shipping_date,title,text, names, surname FROM surrogate_keys.message
INNER JOIN surrogate_keys.user_message 
ON user_message.messageid = message.id
INNER JOIN surrogate_keys.user 
ON user_message.Userid = user.id
WHERE user_message.Userid = $id_user AND user_message.situation = 'Recibido'";
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
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Quejas y peticiones</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="perfil_admin.php" class="boton_naranja2  boton" >Atrás</a></li>
        <li><a href="Qeujas_pet_admin.php" class="boton_naranja2  boton">Bandeja de entrada</a>
          <li><a href="nombredoc.html" class="boton_naranja2  boton">Bandeja de salida</a>
            <li><a href="Enviar_mensaje.php" class="boton_naranja2  boton">Enviar mensaje</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <div class="msg">
        <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>CÓDIGO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>FECHA</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ASUNTO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>MENSAJE</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>REMITENTE NOMBRE</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>APELLIDO</strong></th>
                    <th colspan="1" style="padding: 6px; text-align: center;"><strong>ELIMINAR</strong></th>
                    
                 </tr>
                 <?php    $db = new Database();
                        $query = $db->connect()->prepare($usuarios);    
                        $query->execute();
                 while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                 ?>
            <tr>
            <td width="90px" style="padding: 6px; text-align: center;"><?php echo $row["code"];?></td>
                <td width="150px" style="padding: 6px; text-align: center;"><?php echo $row["shipping_date"];?></td>
                <td width="200px" style="padding: 6px; text-align: center;"><?php echo $row["title"];?></td>
                <td width="200px" style="padding: 6px; text-align: center;"><?php echo $row["text"];?></td>
                <td width="190px" style="padding: 6px; text-align: center;"><?php echo $row["names"];?></td>
                <td width="175px" style="padding: 6px; text-align: center;"><?php echo $row["surname"];?></td>
                <td width="100px"  style="padding: 6px; text-align: center;"><a  href="procesar_eli_msg_admin.php?id=<?php echo $row["id"];?>" class="link table_del">Eliminar</a></td>
            </tr>
            <?php 
            }?>
            </tbody>
        </table>
        </div>
    </main>
    <script src= "eli_msg_admin.js"></script>
</body>
</html>