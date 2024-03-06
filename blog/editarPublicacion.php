<?php
require '../conexion.php';

if(isset($_POST['btnSubir']))
{
$id = $_POST['id'];
$Titulo = $_POST['Titulo'];
$Descripcion = $_POST['Descripcion'];
$Contenido = $_POST['Contenido'];

// similar para subir imagen
// Datos de la imagen 
$Imagen = $_FILES['Imagen']['name'];
//En esta seccion se coloca a que carpeta se va a subir la imagen y de que variable se va a tomar
$ruta = "imagenes/" . $Imagen;

// move_uploaded_file : Es una función de PHP que mueve un archivo cargado al servidor desde su ubicación temporal a una ubicación permanente.
// $_FILES['Imagen']['tmp_name'] : Es una variable superglobal de PHP que contiene la ruta temporal del archivo cargado en el servidor. 
// tmp_name y Imagen : es el nombre del campo de archivo en el formulario HTML.
// ruta : Es la ubicación permanente donde se desea guardar el archivo. En este caso, se construye concatenando una carpeta llamada imagenes/ con el nombre del archivo ($imagen) que se está cargando.
move_uploaded_file($_FILES['Imagen']['tmp_name'], $ruta);

// Para colocar la imagen o actualizar, debera colocar la variable $ruta, de las cuales estas estan tomando las imagenes
$sql = "update publicaciones set 
Titulo='$Titulo',
Descripcion='$Descripcion',
Contenido='$Contenido', 
Imagen='$ruta'
where id_Publicacion='$id'";

$resultado = mysqli_query($conexion, $sql);

if ($resultado)
{
    header('Location: interfaz.php');
}else{
    echo "No se realizo";
}
}
?>

