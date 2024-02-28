<?php
require 'actualizar_id.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
<div class="container">
    <form action="editarusuario.php" method="post">
        <h1>Editar usuario</h1>
        <!-- el value : debe ser equivalente al campo de la base de datos -->
        <input type="hidden" name="id" value="<?= $row['id_Usuario'] ?>">
        <div class="form-group"> 
        <input type="text" class="form-control" name="nombre" value="<?= $row['correo'] ?>">
        </div>
        
        <!-- De esta manera se puede seleccionar opciones -->
        <select class="form-select mb-3" name="carreras" arial-label="Default select example">
            <option selected disabled>--Selecciona una carrera--</option>
        <?php
        require '../conexion.php';
        
        // Realiza la primera consulta para obtener el registro seleccionado
        $sql = "select * from carreras where id_Carreras =" . $row['id_Carrera'];//este va a traer el id_Carrera de id_Carreras
       
        //se utiliza para ejecutar una consulta SQL en una base de datos y almacenar los resultados de esa consulta.
        // query() : Este es un método de la clase de conexión a la base de datos que se utiliza para ejecutar una consulta SQL en la base de datos.
        $resultado = $conexion->query($sql);
        
        // se utiliza para recuperar la próxima fila de resultados de una consulta a una base de datos
        // fetch_assoc : es tomar la próxima fila del conjunto de resultados y devolverla como un array asociativo.
        // obtienes la siguiente fila de resultados de la consulta y almacenas sus datos en la variable.
        $registro_seleccionado = $resultado->fetch_assoc();
          
        //Mostrar la opción seleccionada
        echo "<option selected value='" . $registro_seleccionado['id_Carreras'] . "'>" . $registro_seleccionado['Nombre'] . "</option>";

        // <----------Para traer los otros registros para cuando se requiera editar-------->
        //Esta línea de código crea una consulta SQL para seleccionar todas las filas y columnas de la tabla llamada "carreras" en la base de datos
        //$conexion: Se conecta a la base de datos 
        //$query : Y ejecuta el query
        $sql2 = "SELECT * FROM carreras";//este buscatodos los registros de carreras
        $resultado2 = $conexion->query($sql2);

        //while : es una estructura de control de flujo que permite repetir un bloque de código mientras se cumpla una determinada condición.
        // fetch_assoc : es tomar la próxima fila del conjunto de resultados y devolverla como un array asociativo.
        while ($fila = $resultado2->fetch_assoc()) 
        {
            // Esta línea verifica si el ID de la carrera de la fila actual ($fila['id_Carreras']) es diferente al ID de la carrera que ya está seleccionada ($registro_seleccionado['id_Carreras']). Esto se hace para evitar mostrar dos veces la misma opción en un menú desplegable
            if ($fila['id_Carreras'] != $registro_seleccionado['id_Carreras'])
            {
            echo "<option value='" . $fila['id_Carreras'] . "'>" . $fila['Nombre'] . "</option>"; 
            } 
        }
        ?>
        </select>
        <br>
        <input type="submit" class="btn btn-primary" value="Actualizar">
    </form>
    </div>
</body>
</html>