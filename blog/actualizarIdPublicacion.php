<?php

require '../conexion.php';

$id = $_GET['id_Publicacion'];

$sql = "select * from publicaciones where id_Publicacion=".$_GET['id_Publicacion'];
$resultado = $conexion->query($sql);

$row = $resultado->fetch_assoc();

$query = mysqli_query($conexion,$sql);
$row = mysqli_fetch_array($query);
?>