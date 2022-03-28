<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/asig.css">
    <title>Asignar ficha</title>
</head>
<body>
    <a href="mod_usuario.php">Atrás</a>
    <h2>Asignar ficha</h2>
    <form  action="Procesar_asig.php" method="post">
        <section class="tabla">
                <div>Tipo de documento: 
                    <select class="select" name="tipo_doc" >
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="Pas">Pasaporte</option>
                    <option value="DNI">Documento Nacional de Identificación</option>
                    <option value="NIT">Número de Identificación Tributaria</option>
                    </select>
                </div>
                <div>Número de documento: <input type="number" name="num_doc" placeholder="Número de documento"></div>
                <div>Número de ficha: <input type="number" name= "course"placeholder="Numero de ficha"></div>
            <input class="button" type="submit" value="Asignar Ficha"> 
        </section>
    </form>
</body>
</html>