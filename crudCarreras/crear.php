<?php
    include '../clases/Carreras.php';

    if(isset($_POST['crear']))
    {
        $carrera = new Carrera($_POST['nombre']);

        if($carrera->crear())
        {
            header("Location: index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../diseno/form.css">

</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Crear</h1>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="form-group">
                <button class="azul" type="submit" name="crear">Crear</button>
                <a href="../crudcarreras/index.php">Regresar</a>
            </div>
        </form>
    </div>
</body>

</html>