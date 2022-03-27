<?php
include 'database.php';
session_start();
$id_class= $_GET["id"];
$num_doc = $_SESSION['numero_docu'];
$name_doc = $_SESSION['tipo_docu'];
//Consulta SQL
$sql1="SELECT class.id, class.code, course.code as ficha, names, surname, subject FROM user 
INNER JOIN surrogate_keys.document ON user.documentid = document.id 
INNER JOIN user_class ON user_class.Userid = user.id 
INNER JOIN class ON class.id = user_class.Classid
INNER JOIN surrogate_keys.course_class ON course_class.id_class= class.id
INNER JOIN surrogate_keys.course ON course.id = course_class.id_course
WHERE class.id = $id_class;";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar clase</title>
</head>
<body class="fondo1 centrar">
    <!--Botón para volver a la página anterior-->
    <a href="clases_instructor.php" class="boton_naranja boton letra_mediana izquierda">Atrás</a>
    <!--Título de la página-->
    <?php     
        $db = new Database();
        $query = $db->connect()->prepare($sql1);    
        $query->execute();
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)){
            ?>
    <h1 class="letra_grande inline_block">Modificar clase <?php echo $fila["code"];?></h1>
    <!--Formulario-->
    <form action="procesar_mod_class.php" class="formulario border letra_mediana"method="post">
        <ul class="text_left">
        <li><label>Materia:</label></li>
        <li><input name="materia" class="input border letra_pequenia" value="<?php echo $fila["subject"];?>"></li>
        <li><label>Estado:</label></li>
        <li>
            <select class="select" name="status">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
            </select>
        </li>
        <li><label>Ficha:</label></li>
        <li><input name="ficha" class="input border letra_pequenia" value="<?php echo $fila["ficha"];?>"></li>
        <input name="id" class="hide" value="<?php echo $fila["id"];?>">
        <input name="ficha_actu" class="hide" value="<?php echo $fila["ficha"];?>">
        </ul>
        <?php 
            }?>
        <!--Botón de enviar-->
        <input type="submit" value="Modificar clase" class="boton boton_naranja centrar letra_mediana">
    </form>
</body>
</html>