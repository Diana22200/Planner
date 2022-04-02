<!DOCTYPE html>
<html lang="en">
<head>
    <link href="CSS/style_enviarmensaj.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar mensaje</title>
     <!--botón de ir atrás-->
     <a href="mensaje_enviado.php" class="boton_naranja letra_mediana izquierda boton">Atrás</a>
</head>
<body><p></p>

    <h2>Enviar mensaje</h2>
    <form  action="Enviar_mensaje.php" method="POST">
        <section class="tabla">
            
                <div>
                    <label for="email">Correo destinatario</label>
                    <input class="espacio" name="email" id="email" type="text" placeholder="Ingresar correo">
                </div>

                <div>
                    <label for="title">Asunto</label>
                    <input class="espacio" name="title" id="title" type="text" placeholder="Ingresar asunto">
                </div>

                <div class="espacio_mensaje">
                    <label for="text">Mensaje</label>
                    <input class="espacio" name="text" id="text" type="text" placeholder="Ingresar mensaje">
                </div>
    
        <div class="boton_enviar">
           <input class="button" type="submit" value="Enviar"> 
        </div>
        </section>
    </form>
</body>
</html>