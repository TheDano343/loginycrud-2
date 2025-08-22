<?php
    include '../clases/Carreras.php';

    $id = $_GET['id'] ?? null;

    if($id)
    {
        $carrera = new Carrera();
        $carreraActual = $carrera->obtenerId($id);

        if(isset($_POST['actualizar']))
        {
            $carrera = new Carrera($_POST['nombre']);

            if($carrera->actualizar($id))
            {
                header("Location: index.php");
            }else{
                echo "Error al actualizar";
            }
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
            <h1>Actualizar</h1>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $carreraActual['nombre']; ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="azul" name="actualizar">Actualizar</button>
                <a href="../crudcarreras/index.php">Regresar</a>
            </div>
        </form>
    </div>
</body>

</html>













    


