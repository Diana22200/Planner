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
    <link rel="stylesheet" href="CSS/estilosmodificar.css">
    <title>Cronograma General</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<header>
    <div class="cabecera">
        <a id="logo" target="_blank"><img src="https://i.postimg.cc/50H7jWw1/logo-planner-2-1.png"></a>
        <h1>Cronograma general</h1>
    </div>
</header>


 
<body>
    <section>
    <div class="contenedor">
    <table class="tabla">
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
    
    <aside>
        <div class="contenedor_menu">
            <ul>
                
       <li> <a href ="perfil_estudiante.php" class="boton boton_naranja izquierda"  >Mi perfil</a></li>
       <li>  <a href= "clases_estudiante.php"class="boton boton_naranja izquierda" > Clases</a> </li> 
       <li>  <a href= "#"     class="boton boton_naranja izquierda" >Cronograma</a> </li> 
       <li> <a href ="quejas_y_peticiones_estudiante.php"class="boton boton_naranja izquierda" >Quejas y peticiones</a> </li> 
       <li> <a href ="#"  class="boton boton_naranja izquierda" >Cerrar sesion</a> </li> 
        </ul>
        </div>
    </aside>
</body>
</html>
