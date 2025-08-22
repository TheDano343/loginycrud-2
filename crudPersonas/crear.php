<?php
    require_once '../clases/Personas.php';
    require_once '../clases/Carreras.php';


     $persona = new Persona();
     $personas = $persona->obtenerPersonas();
     $carrera = new Carrera();
     $carreras = $carrera->obtenerCarreras();
 

    if(isset($_POST['crear']))
    {
        $persona = new Persona($_POST['nombrePersona'],$_POST['carrera_id']);

        if($persona->crear())
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
                <input type="text" class="form-control" name="nombrePersona">
            </div>

            <div class="form-group">
                <label for="">Carrera</label>
                <select class="form-control" name="carrera_id">
                    <option selected disabled>--Seleccione alguna carrera--</option>
                    
                    
                    <?php foreach ($carreras as $c): ?>
                
                    <option value="<?= $c['id'] ?>"><?= $c['nombre'] ?></option>
                        

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <button class="azul" type="submit" name="crear">Crear</button>
                <a href="../crudPersonas/index.php">Regresar</a>
            </div>
        </form>
    </div>
</body>

</html>