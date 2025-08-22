<?php

require_once '../conexion/conexion.php';

class Carrera extends Conexion
{
    private int $id;
    private string $nombre;

    public function obtencionId()
    {
        return $this->id;
    }

    public function obtenerNombre()
    {
        return $this->nombre;
    }

    public function colocarNombre($nombre)
    {
        return $this->nombre = $nombre;
    }

    public function __construct($nombre = '')
    {
        parent::__construct();
        $this->nombre = $nombre;
    }

    public function obtenerCarreras()
    {
        $carreras = "SELECT * FROM carreras";
        $obtencionCosultas = $this->conexion->query($carreras);
        return $obtencionCosultas->fetch_all(MYSQLI_ASSOC);
    }

    public function crear()
    {
        $insertar = "INSERT INTO carreras(nombre) VALUES(?)";
        $stmt = $this->conexion->prepare($insertar);
        $stmt->bind_param("s",$this->nombre);
        return $stmt->execute();
    }

    public function obtenerId($id)
    {
        $obtencionDeId = "SELECT * FROM carreras WHERE Id = ?";
        $stmt = $this->conexion->prepare($obtencionDeId);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id)
    {
        $actualizar = "UPDATE carreras SET nombre = ? WHERE Id = ?";
        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bind_param("si",$this->nombre,$id);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $eliminacion = "DELETE FROM carreras WHERE Id = ?";
        $stmt = $this->conexion->prepare($eliminacion);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}



?>