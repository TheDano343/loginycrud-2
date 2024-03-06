<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php
    session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <!-- Botón del navbar para dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del menú -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../blog/interfaz.php"> Index </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../crud/usuarios.php"> Usuarios </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../crud/cerrar.php"> Salir  </a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                    <a class="nav-link"><?php echo $_SESSION['correo']; ?></a>
            </li>
          </ul>
        </div>
    </div>
</nav>

<br>

    <!-- Agregar el archivo JavaScript de Bootstrap al final del body para una mejor carga -->
    <!-- Se pone  primero el javasript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
