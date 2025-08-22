<?php

include '../clases/Personas.php';
include '../clases/Carreras.php';

$id = $_GET['idPersona'] ?? null;

$persona = new Persona();
$personaActual = $persona->obtenerId($id);
$carrera = new Carrera();
$carreras = $carrera->obtenerCarreras();

if(isset($_POST['actualizar']))
{
    $persona = new Persona($_POST['nombrePersona'], $_POST['carrera_id']);

    if($persona->actualizar($id))
    {
        header("Location: index.php");
    }else{
        echo "Error al actualizar";
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
                <input type="text" class="form-control" name="nombrePersona" value="<?= $personaActual['nombrePersona']; ?>">
            </div>

            <div class="form-group">
                <label for="">Carrera</label>
                <select class="form-control" name="carrera_id">
                    
                    
                    <?php foreach ($carreras as $c): ?>
                
                <option value="<?= $c['id'] ?>" <?= $c['id']==$personaActual['carrera_id']?'selected':'' ?>>
                <?= $c['nombre'] ?>
                </option>                       

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="azul" name="actualizar">Actualizar</button>
                <a href="../crudpersonas/index.php">Regresar</a>
            </div>
        </form>
    </div>
</body>

</html>