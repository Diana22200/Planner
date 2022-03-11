<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin_style.css">
    <title>Registrarse</title>
</head>
<body>      
    <!--Se DEBE poner el perfil_administrador-->
    <a class= "boton boton_pequenio" href="index.html">Atrás</a>
    <h2>Registrarse</h2>
    <form class="tabla"  action="procesar_registrar.php"  method="POST">
            <div>Nombres: <input name="name" type="text" placeholder="Ingrese nombres"></div>
            <div>Apellidos: <input name="surname" type="text" placeholder="Ingrese apellidos"></div>
            <div>Tipo de documento: 
                    <select class="select" name="Roleid" id="">
                    <option value="2">Estudiante</option>
                    <option value="3">Instructor</option>
                    
                    </select>
                </div>
                <div>Tipo de documento: 
                    <select class="select" name="tipo_doc" id="">
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="Pas">Pasaporte</option>
                    <option value="DNI">Documento Nacional de Identificación</option>
                    <option value="NIT">Número de Identificación Tributaria</option>
                    </select>
                </div>
            <div>Número de documento: <input name="num_doc" type="text" placeholder="Número de documento"></div>
            <div>Email: <input name="email" type="email" placeholder="Ingrese su email"></div>
            <div>Contraseña: <input name="password" type="password" placeholder="Ingrese contraseña"></div>
            <div>Confirmar contraseña: <input name="password_two" type="password" placeholder="Ingrese nuevamente contraseña"></div>
            <input class="button" type="submit" value="Registrarse"> 
    </form>
</body>
</html>