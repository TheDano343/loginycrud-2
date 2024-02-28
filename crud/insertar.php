<?php
require '../conexion.php';

$id = null;// null : se pone cuando es aunto incremental
$correo = $_POST['correo'];
$contraseña = $_POST['contrasena'];
$categoria = $_POST['TCarrera'];//se crea variables de igual manera sobre el campo con el cual se esat relacionando las tablas


// Lo que se escriba en las variables se enviara como un insert, lo cual enviara la informacion a la case de datos
$sql = "insert into login values('$id', '$correo', '$contraseña', '$categoria')";// $ : son de los valores los cuales se hayan insertado
// mysqli_query : es usada para simplificar la acción de ejecutar una consulta sobre la base de datos representada por el parámetro
$query = mysqli_query($conexion, $sql);

// Y al sucede el query este enviara al index
if($query)
{
    Header("Location: index.php");
};

?>

