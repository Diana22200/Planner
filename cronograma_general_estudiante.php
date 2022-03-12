<?php
include 'database.php';
session_start();
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/stylosquejas.css">
    <title>Cronograma General</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Crononograma general</h1>
    </header>



<main  class="inline_block cont_info_perfil">
        <div class="msg">
        <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th><strong>TIPO</strong></th>
                    <th><strong>TÍTULO</strong></th>
                    <th><strong>FECHA LÍMITE </strong></th>
                    <th><strong>ESTADO</strong></th>
                    <th><strong>ASIGNATURA</strong></th>
                    <th><strong>CALIFICACION</strong></th>
                    
                 </tr>


                 <?php     $db = new Database();
                        $query = $db->connect()->prepare("SELECT type, title,deadline, activity.status, subject, score FROM surrogate_keys.class  INNER JOIN user  ON user.id =class.id INNER JOIN activity  ON activity.id=class.id INNER JOIN qualification  ON qualification.id=class.id  INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'");    
                        $query->execute();
                 while ($fila = $query->fetch(PDO::FETCH_ASSOC)){?>



            <tr>
                <td><?php echo $fila['type']?></td>
                <td><?php echo $fila['title']?></td>
                <td><?php echo $fila['deadline']?></td>
                <td><?php echo $fila['status']?></td>
                <td ><?php echo $fila['subject']?></td>
                <td ><?php echo $fila['score']?></td>
            </tr>
                 <?php
                }
                ?>
            </tbody>
        </table>
            </div>
    </main>
    
       <!--Menú de navegación estudiante-->
       <nav class="inline_block menu_perfil letra_mediana"><!--"iniciar_sesion.php?cerrar_sesion=1"-->
        <ul>
        <li><a href="perfil_estudiante.php" class="boton boton_naranja2">Mi perfil</a></li>
        <li><a href="clases_estudiante.html" class="boton_naranja2  boton">Clases</a></li>
        <li><a href="cronograma_general_estudiante.php" class="boton_naranja2  boton">Cronograma</a></li>
        <li><a href="Quejas_pet_estudiante.php" class="boton_naranja2  boton">Quejas y peticiones</a></li>
        <li><a href="añadir_clase_estudiante.html" class="boton_naranja2  boton">Añadir clase</a></li>
        <li><a href="iniciar_sesion.php?cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
        </ul>
    </nav>
</body>
</html>
