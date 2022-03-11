<?php

$server="localhost";
$database="surrogate_keys";
$user="root";
$pass="";
$conexion=new mysqli($server, $user, $pass, $database);

if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}
if(isset($_POST['text']) && isset($_POST['title'])&& isset($_POST['email'])){
$text = $_POST['text'];
$title = $_POST['title'];
$email = $_POST['email'];

$selec1="SELECT * FROM message ORDER BY id DESC LIMIT 1";
$selec2="SELECT a.id FROM user a INNER JOIN user_message b ON a.id = b.id WHERE email = '$email'";

$sql = "INSERT INTO message (text, shipping_date, title, code) VALUES ('$text', now()), '$title',(SELECT ROUND(((99999 - 00000) * RAND() + 1), 0)));";
$sql .= "INSERT INTO user_message (Userid, messageid) VALUES('$selec2', '$selec1');";
$sql .= "INSERT INTO situation (name, messageid) VALUES ('Enviado','$selec1')";
 if ($conexion->multi_query($sql) === TRUE) {
  echo "Se ha enviado el mensaje.";
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}
}
$conexion->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/style_enviarmensaj.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar mensaje</title>
     <!--botón de ir atrás-->
     <a href="Quejas_peticiones.php" class="boton_naranja letra_mediana izquierda boton">Atrás</a>
</head>
<body><p></p>

    <h2>Enviar mensaje</h2>
    <form  action="Enviar_mensaje.php" method="POST">
        <section class="tabla">
            
                <div>
                    <label for="email">Correo destinatario</label>
                    <input class="espacio" name="email" type="text" placeholder="Ingresar correo">
                </div>

                <div>
                    <label for="title">Asunto</label>
                    <input class="espacio" name="title" type="text" placeholder="Ingresar asunto">
                </div>

                <div>
                    <label for="text">Mensaje</label>
                    <input class="espacio" name="text" type="text" placeholder="" style="height: 100px;">
                </div>
    
        <div class="boton_enviar">
           <input class="button" type="submit" value="Enviar"> 
        </div>
        </section>
    </form>
</body>
</html>