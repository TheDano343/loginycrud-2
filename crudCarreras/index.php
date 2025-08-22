<?php
    require_once '../clases/Carreras.php';

    $carrera = new Carrera();
    $carreras = $carrera->obtenerCarreras();

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
        <a  href="../crudCarreras/crear.php"><button class="azul">Agregar</button></a>

        <table border="1">
            <thead>
                <tr>
                    <td scope="col">Id</td>
                    <td scope="col">Carrera</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td class="type">
                        <?= $carrera['id']; ?>
                    </td>
                    <td class="type">
                        <?= $carrera['nombre']; ?>
                    </td>
                    <td>
                        <th><a href="editar.php?id=<?= $carrera['id']; ?>"><button class="amarillo">Editar</button></a></th>
                        <th><a href="eliminar.php?id=<?= $carrera['id']; ?>"><button class="rojo">Borrar</button></a></th>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>