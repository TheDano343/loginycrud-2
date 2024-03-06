<?php
require '../crud/cabecera.php';
require '../conexion.php';
require 'visualizar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<div class="container">
    <a class="nav-link" href="../blog/creacionP.html">
        <button class="btn btn-primary btn-sm" >
            Crear
        </button>
    </a>

    <!--method:post : Subida de archivos -->
    <form action="subir.php" method="POST">
    <!-- while : por cada usario que se encuentra va a imprimir la informacion de la fila -->
    <!-- mysqli_fetch_array : guardar la información en los índices numéricos del array resultante -->
    <!-- row : Lo que hace row es mostrar el resultado de un campo al hacer la consulta de alguna columna en la base de datos. -->
    <!-- while : es una estructura de control de flujo que permite repetir un bloque de código mientras se cumpla una determinada condición. -->

    <div class="row">
    
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <div class="col-lg-4 col-md-6 mb-4">
            <br>
            <!-- Apartir de aqui se inicia la tarjeta -->
            <div class="card position-relative">
            <img src="<?= $row['Imagen'] ?>" class="card-img-top" alt="imagen">


            <div class="card-body">
            <h5 class="card-title"><?= $row['Titulo'] ?></h5>
            <p class="card-text"><?= $row['Descripcion'] ?></p>
            <a class="btn btn-danger" href="eliminarP.php?id_Publicacion=<?= $row['id_Publicacion'] ?>">Borrar</a>
            <a class="btn btn-link"   href="actPublicacion.php?id_Publicacion=<?= $row['id_Publicacion'] ?>">Editar</a>

                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div> 
</div>

    </form>
</body>
</html>
