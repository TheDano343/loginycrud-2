<?php

require '../conexion.php';

$id = $_GET['id_Usuario'];// Get : Para obtener la informacion

//este query sirve para visualizar los datos y traer un id en especifico
// $sql = "select * from login where id_Usuario='$id'";
$sql = "select * from login where id_Usuario =".$_REQUEST['id_Usuario'];// $_REQUEST : nos permite capturar variables enviadas desde formularios con los métodos GET o POST.
$resultado = $conexion->query($sql);

// fetch_assoc : es tomar la próxima fila del conjunto de resultados y devolverla como un array asociativo.
$row = $resultado->fetch_assoc();

//$conexion : Se coloca para hacer la conexion
//$sql: Se coloca para realizar la sentencia de sql
//mysqli_query: Combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultados
//$conexion: Se conecta a la base de datos 
//$query : Y ejecuta el query
//mysqli_fetch_array : guardar la información en los índices numéricos del array resultante
$query = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($query);

?>