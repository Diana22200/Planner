<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir clase</title>
</head>
<body class="fondo1 centrar">
    <!--Botón para volver a la página anterior-->
    <a href="perfil_instructor.php" class="boton_naranja boton letra_mediana izquierda">Atrás</a>
    <!--Título de la página-->
    <h1 class="letra_grande inline_block">Añadir clase</h1>
    <!--Formulario-->
    <form class="formulario border letra_mediana" action="procesar_crea_clase.php"  method="POST">
        <ul class="text_left">
        
        <li><label>Materia:</label></li>
        <li><input name="materia" class="input border letra_pequenia"></li>

        <li><label>Ficha:</label></li>
        <li><input name="course" class="input border letra_pequenia"></li>
        
        </ul>
    <!--Botón de enviar-->
        <input type="submit" value="Añadir clase" class="boton boton_naranja centrar letra_mediana">
    </form>
</body>
</html>