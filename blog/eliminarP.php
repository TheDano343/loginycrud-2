<?php 
require '../conexion.php';

// Get : Para obtener la informacion
$id = $_GET['id_Publicacion'];

// se borrara la informacion de la tabla
                        //where : sirve para borrar el dato del id especifico
$sql = "Delete from publicaciones where id_Publicacion='$id'";

//$conexion : Se coloca para hacer la conexion
//$sql: Se coloca para realizar la sentencia de sql
//mysqli_query: Combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultados
$query = mysqli_query($conexion, $sql);

// Y al sucede el query este enviara al index
if($query)
{
    Header("Location: interfaz.php");
}