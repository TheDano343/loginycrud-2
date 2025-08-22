<?php
    include '../clases/Personas.php';
    require_once '../clases/Carreras.php';
    

    $persona = new Persona();
    $personas = $persona->obtenerPersonas();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../diseno/style.css">
</head>

<body>

    <div class="centrado">
        <a href="../crudPersonas/crear.php"><button class="azul">Agregar</button></a>

        <table border="1">
            <thead>
                <tr>
                    <td scope="col">Id</td>
                    <td scope="col">Carrera</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($personas as $persona): ?>
                <tr>
                    <td class="type">
                        <?= $persona['idPersona']; ?>
                    </td>
                    <td class="type">
                        <?= $persona['nombrePersona']; ?>
                    </td>
                    <td class="type">
                        <?= $persona['nombre']; ?>
                    </td>
                    <td>
                        <th><a href="editar.php?idPersona=<?= $persona['idPersona']; ?>"><button class="amarillo">Editar</button></a></th>
                        <th><a href="eliminar.php?idPersona=<?= $persona['idPersona']; ?>"><button class="rojo">Borrar</button></a></th>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>