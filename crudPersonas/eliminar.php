<?php

    include '../clases/Personas.php';

    $persona = new Persona();
    $id = $_GET['idPersona'] ?? null;

    if($id && $persona->eliminar($id))
    {
        header("Location: index.php");
    }else{
        echo "Error al actualizar";
    }

?>