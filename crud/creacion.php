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
    <div>
    <!--method:post : Subida de archivos -->
    <form action="insertar.php" method="POST">
    <div class="container">
    <h1 class="titulo">Crear usuarios</h1>
    <br>
    <div class="form-group">
    <!--name: Permite a un script acceder a su contenido. -->
    <input class="form-control" name="correo" type="text" placeholder="coloca nombre">
    </div>

    <div class="form-group">
    <!-- De esta manera se puede seleccionar opciones -->
    <select class="form-select" name="TCarrera">
        <option selected disabled>--Seleccione alguna carrera--</option>
        <?php
        require '../conexion.php';
        
        $sql = $conexion->query("select * from carreras");

        //while : por cada usario que se encuentra va a imprimir la informacion de la fila 
        // fetch_assoc : es un método en PHP que se utiliza para recuperar una fila de resultados de una consulta a una base de datos MySQL en forma de un array asociativo.
                            //que de la variable $resultado, nos traiga el id
        while ($resultado = $sql->fetch_assoc())
        {
        // value='".$resultado['id_Carreras']."' : Define el atributo value de la opción. Este es el valor que se enviará al servidor cuando se seleccione esta opción. Se obtiene del campo id_Carreras del array $resultado.
        // ".$resultado['Nombre']."  : Es el texto que se mostrará al usuario en la opción. Se obtiene del campo Nombre del array $resultado.
            echo "<option value='".$resultado['id_Carreras']."'>".$resultado
            ['Nombre']."</option>";//Y que de resultado ahora traiga el 'Nombre' de la carrera 
        }

        ?>
    </select>
    </div>

    <!-- <div class="form-group">
    <input class="form-control" name="contrasena" type="text" placeholder="coloca contraseña">
    </div> -->

    <div class="form-group"> 
        <!-- especifica el método HTTP que el navegador usará para enviar el formulario -->
    <button input="submit" class="btn btn-primary" name="creacion">Crear</button>
    <a href="usuarios.php" class="btn btn-dark">Regresar</a>
    </form>
    </div> 
    </div>

</body>
</html>