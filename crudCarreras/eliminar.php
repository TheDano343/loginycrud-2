<?php

    include '../clases/Carreras.php';

    $carrera = new Carrera();
    $id = $_GET['id'] ?? null;

    if($id && $carrera->eliminar($id))
    {
        header("Location: index.php");
    }else{
        echo "Error al actualizar";
    }

?>