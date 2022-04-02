<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/admin_style.css">
    <title>Añadir Actividad</title>
</head>
<body>      
    
    <a class= "boton boton_pequenio" href="Administrar_actividad.php">Atrás</a>
    <h2>Añadir actividad</h2>
    <form class="tabla"  action="procesar_actividad.php"  method="POST">
            <div>Nombre de la actividad: <input name="title" type="text" placeholder="Nombre de la actividad"></div>
            <div>Descripción de la actividad:<input name="description" type="text" placeholder="Descripción de la actividad:"></div>
            <div>Tipo de actividad:
                    <select class="select" name="type" id="">
                    <option value="">Tarea</option>
                    <option value="">Evaluación </option>
                    <option value="">Trabajo en clase </option>
                    </select>
                </div>
                <div>Fecha de entrega 
                    <input type="date" name="deadline" id="">
                    </select>
                </div>
            <div>Link de la actividad: <input name="link" type="link" placeholder="link"></div>
            
            <input class="button" type="submit" value="Añadir"> 
    </form>
</body>
</html>