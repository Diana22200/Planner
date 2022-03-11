<?php
include_once 'database.php';
$usuarios = "SELECT title, status, timestamp type FROM activity INNER JOIN document ON user.documentid = document.id INNER JOIN surrogate_keys.role ON role.id = user.Roleid  ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilosmodificar.css">
    <title>modificar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<header>
    <div class="cabecera">
        <a id="logo" target="_blank"><img src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png%22%3EPlanner%22%3E"></a>
        <h1>Modificar actividades</h1>
    </div>
</header>
<body>
    <section>
    <div class="contenedor">
    <table class="tabla">
      <tr>
          <th>Fecha</th>
          <th>Actividad</th>
          <th>Estado</th>
          <th>Modificar</th>
      </tr>
      <tr>
          <td>14-04-2021</td>
          <td>Actividad 01</td> 
          <td>Inactivo</td>
          <td><button>Modificar</button></td>
      </tr>
      <tr>
        <td>14-04-2021</td>
        <td>Actividad 01</td> 
        <td>Inactivo</td>
        <td><button>Modificar</button></td>
    </tr>
    <tr>
        <td>14-04-2021</td>
        <td>Actividad 01</td> 
        <td>Inactivo</td>
        <td><button>Modificar</button></td>
    </tr>
    <tr>
        <td>14-04-2021</td>
        <td>Actividad 01</td> 
        <td>Inactivo</td>
        <td><button>Modificar</button></td>
    </tr>
    <tr>
        <td>14-04-2021</td>
        <td>Actividad 01</td> 
        <td>Inactivo</td>
        <td><button>Modificar</button></td>
    </tr>
    <tr>
        <td>14-04-2021</td>
        <td>Actividad 01</td> 
        <td>Inactivo</td>
        <td><button>Modificar</button></td>
    </tr>
    <tr>
        <td>14-04-2021</td>
        <td>Actividad 01</td> 
        <td>Inactivo</td>
        <td><button>Modificar</button></td>
    </tr>
    </table>
    </div>
</section>
    <aside>
        <div class="contenedor_menu">
            <ul>
       <li> <a href class="boton boton_naranja izquierda" >Atrás</a></li>
       <li>  <a href class="boton boton_naranja izquierda" >Eliminar Actividad</a> </li> 
       <li>  <a href class="boton boton_naranja izquierda" >Modificar Actividad</a> </li> 
       <li> <a href class="boton boton_naranja izquierda" >Añadir Actividad</a> </li> 
       <li> <a href class="boton boton_naranja izquierda" >Calificar Actividad</a> </li> 
        </ul>
        </div>
    </aside>
</body>

</html>