<?php
require '../conexion.php';

$id = $_POST['id'];
$correo = $_POST['nombre'];
$carrera = $_POST['carreras'];

                                     // where : solo actualize la información de ese id
     // set correo : colocara la información de la cual se obtuve de $correo    $id :  Nos trae el registro del dato que requerimos
$sql="update login set correo='$correo', id_Carrera='$carrera' where id_Usuario='$id'";
$query = mysqli_query($conexion, $sql);

// Y al sucede el query este enviara al index
if($query){
    Header("Location: usuarios.php");
};

?>