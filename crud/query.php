<?php

require '../conexion.php';

// $sql = "select * from login
//  inner join carreras on login.id_Carrera = carreras.id_Carreras";
$sql = "SELECT *
FROM login
LEFT JOIN carreras ON login.id_Carrera = carreras.id_Carreras";//este query sirve para visualizar todos los datos
// inner join : donde el producto y los productos en donde productos va a traer los id_Carrera en id_Carreras de la tabla Carreras


// mysqli_query : es usada para simplificar la acción de ejecutar una consulta sobre la base de datos representada por el parámetro
//$conexion : Se coloca para hacer la conexion de la base de datps de la cual se obtendra informacion
//$sql: se coloca para realizar la sentencia de sql y insertar los datos que se van a colocar
$query = mysqli_query($conexion, $sql);

?>

