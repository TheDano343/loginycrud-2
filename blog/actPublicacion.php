<?php
require 'actualizarIdPublicacion.php';
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
    <form action="editarPublicacion.php" enctype="multipart/form-data" method="POST">
        <h1>Editar Publicacion</h1>
            <input type="hidden" name="id" value="<?= $row['id_Publicacion'] ?>">
        <div class="form-group">
            <input type="text" class="form-control" name="Titulo" value="<?= $row['Titulo'] ?>">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="Descripcion"><?= $row['Descripcion'] ?></textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="Contenido"><?= $row['Contenido'] ?></textarea>
        </div>
        <div class="form-group">
            <input class="form-control" name="Imagen" type="file" id="imagen">
        <?php if (!empty($row['Imagen'])): ?>
            <img src="<?= $row['Imagen'] ?>" class="img-fluid mt-2" alt="Imagen">
        <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary" name="btnSubir">Enviar</button>

    </form>
    </div>

</body>
</html>