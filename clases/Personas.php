<?php

require_once '../conexion/conexion.php';

class Persona extends Conexion
{
    private int $id;
    private string $nombre;
    private int $carreraid;


    public function obtencionId()
    {
        return $this->id;
    }

    public function obtenerNombre()
    {
        return $this->nombrePersona;
    }

    public function obtenerCarrerasId()
    {
        return $this->carrera_id;
    }

    public function colocarNombre($nombre)
    {
        return $this->nombrePersona = $nombre;
    }

    public function colocarCarreraId($carreraid)
    {
        return $this->carrera_id = $carreraid;
    }

    public function __construct($nombre = '',$carreraid = '')
    {
        parent::__construct();
        $this->nombre = $nombre;
        $this->carrera_id = $carreraid;
    }

    public function obtenerPersonas()
    {
        $personas = "SELECT * FROM personas p INNER JOIN carreras c ON p.carrera_id = c.id";
        $obtencionCosultas = $this->conexion->query($personas);
        return $obtencionCosultas->fetch_all(MYSQLI_ASSOC);
    }

    public function crear()
    {
        $insertar = "INSERT INTO personas(nombrePersona,carrera_id) VALUES(?,?)";
        $stmt = $this->conexion->prepare($insertar);
        $stmt->bind_param("si",$this->nombre,$this->carrera_id);
        return $stmt->execute();
    }

    public function obtenerId($id) {
    $sql = "SELECT * FROM personas WHERE idPersona = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bind_param("i", $id);  // 👈 aquí pasamos el id dinámico
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

    public function actualizar($id)
    {
        $actualizar = "UPDATE personas SET nombrePersona = ?, carrera_id  = ? WHERE idPersona = ?";
        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bind_param("sii",$this->nombre,$this->carrera_id,$id);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $eliminacion = "DELETE FROM personas WHERE idPersona = ?";
        $stmt = $this->conexion->prepare($eliminacion);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}



?>