<?php


class Conexion{
    protected $conexion;

    public function __construct() 
    {
        $this->conexion = new mysqli("localhost","root","","crudPOO");

        if($this->conexion->connect_error)
        {
            die("Error de conexion" . $this->conexion->connect_error);
        }
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }
}

?> 

