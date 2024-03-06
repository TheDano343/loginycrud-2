<?php 
require 'query.php';
require '../conexion.php';
require 'cabecera.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<!------------------------------------------------------------------------------------------------------------------->
    

    <div class="container">
        <h2 class="text-center">Lista de usuarios</h2>
        <br>
        <div class="table-responsive">
        <!-- table:para crear la tabla -->
        <table class="table table-hover">
            <!-- thead:debe delimitar el encabezado de la tabla -->
            <thead>

            <!--  -->
            <div class="contianer">
                <a href="creacion.php" class="btn btn-success">Agregar Usuario</a>
            </div>
            <br>
                <!-- tr:que es para crear filas de tablas -->
                <tr>
                    <!-- th:define una celda como encabezado de un grupo de celdas en una tabla -->
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Carrera</th>
                </tr>
            </thead>

            <!-- tbody:delimita las otras partes del contenido de la tabla que no están en el encabezado o en el pie de página de la tabla -->
            <tbody>
                <!-- while : por cada usario que se encuentra va a imprimir la informacion de la fila -->
                <!-- mysqli_fetch_array : guardar la información en los índices numéricos del array resultante -->
                <!-- row : Lo que hace row es mostrar el resultado de un campo al hacer la consulta de alguna columna en la base de datos. -->
                <!-- while : es una estructura de control de flujo que permite repetir un bloque de código mientras se cumpla una determinada condición. -->
                <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                <th><?= $row['id_Usuario'] ?></th>
                <th><?= $row['correo'] ?></th>
                <!-- <th><?= $row['contrasenia'] ?></th> -->
                <!-- Al tener el inner join con la otra tabla se procede a poder colocar el campo que se quiere visualizar -->
                <th><?= $row['Nombre'] ?></th>

                <!-- th:define una celda como encabezado de un grupo de celdas en una tabla -->
                <!-- ?id : parametro para obtener el id -->
                <th><a class="btn btn-primary" href="update.php?id_Usuario=<?= $row['id_Usuario'] ?>">Editar</a></th>
                <th><a class="btn btn-danger" href="eliminar.php?id_Usuario=<?= $row['id_Usuario'] ?>">Eliminar</a></th>
                </tr>
                <!-- endwhile :  es una forma de terminar un bucle while de manera explícita. Cuando estás utilizando while para iterar sobre un conjunto de datos, puedes usar endwhile para indicar el final del bucle. -->
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div>
</body>
</html>
