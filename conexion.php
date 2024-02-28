<?php

// La manera mas facil
$servidor="localhost";
$usuario="root";
$contraseña = "";
$base_de_datos = "blog";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

if (!$conexion){
    die("Conexion fallida: " . mysqli_connect_error());
}
?> 

