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
        <select class="form-select mb-3" name="carreras" aria-label="Default select example">
    <option value="" disabled selected>-- Selecciona una carrera --</option>
    <?php
    require '../conexion.php';

    
    // <----------Para traer los otros registros para cuando se requiera editar-------->
    // Consulta para seleccionar todas las carreras
    //Esta línea de código crea una consulta SQL para seleccionar todas las filas y columnas de la tabla llamada "carreras" en la base de datos
    //$conexion: Se conecta a la base de datos 
    //$query : Y ejecuta el query
    $sql2 = "SELECT * FROM carreras";
    $resultado2 = $conexion->query($sql2);

    //while : es una estructura de control de flujo que permite repetir un bloque de código mientras se cumpla una determinada condición.
    // fetch_assoc : es tomar la próxima fila del conjunto de resultados y devolverla como un array asociativo.
    while ($fila = $resultado2->fetch_assoc()) {
        // Verificar si la carrera actual coincide con la seleccionada
        // $selected : es una variable que se utiliza para determinar si una opción debe estar seleccionada en un elemento 
        // ($fila['id_Carreras'] == $row['id_Carrera']) : es una expresión que compara el valor de la columna id_Carreras en la fila actual del bucle while (representada por $fila) con el valor de la columna id_Carrera de otra fuente de datos (quizás la fila actual del formulario o la base de datos, representada por $row). Si estos valores son iguales, significa que esta opción debe estar seleccionada.
        // ? "selected" : es un operador ternario que asigna "selected" a la variable $selected si la condición anterior es verdadera, es decir, si los valores de id_Carreras y id_Carrera son iguales. De lo contrario, asigna una cadena vacía "" a la variable $selected.
        $selected = ($fila['id_Carreras'] == $row['id_Carrera']) ? "selected" : "";//

        // "<option value='" . $fila['id_Carreras'] . "' $selected>" . $fila['Nombre'] . "</option>" : es una cadena de texto HTML que representa una opción dentro de un elemento <select>.
        //"value='" . $fila['id_Carreras'] . "'" : define el atributo value de la opción, que representa el valor que se enviará al servidor cuando se seleccione esta opción. El valor se obtiene de la columna id_Carreras en la fila actual del bucle while.
        //$selected : este es el atributo selected que determina si esta opción debe estar seleccionada. Si la variable $selected tiene el valor "selected", esta opción se marcará como seleccionada.
        //$fila['Nombre'] : esto imprime el texto que se mostrará al usuario en la opción. Este valor se obtiene de la columna Nombre en la fila actual del bucle while.
        echo "<option value='" . $fila['id_Carreras'] . "' $selected>" . $fila['Nombre'] . "</option>";
    }
    ?>
</select>
        <br>
        <input type="submit" class="btn btn-primary" value="Actualizar">
    </form>
    </div>
</body>
</html>