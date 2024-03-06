<?php 
require '../conexion.php';

if(isset($_POST['creacionP'])) {
    // Obtener los valores de los campos del formulario
    $Titular = $_POST['Titulo'];
    $DescripcionT = $_POST['Descripcion'];
    $ContenidoT = $_POST['Contenido'];

    // Cargar la imagen
    $img = $_FILES['Imagen']['name'];
    // aqui toma el archivo
    $archivo = $_FILES['Imagen']['tmp_name'];

    // ruta : se va a poner como variable en Values
    // imagenes : es la carpeta donde se van a poner las imagenes
        //se crea una ruta para guardar la imagen en una carpeta    
    $ruta = "imagenes/".$img;
   
    // con esta guardamos la imagen que pasamos en el archivo
    // move_uploaded_file() : se utiliza para mover un archivo cargado temporalmente a una ubicación permanente en el servidor
    // archivo : Especifica la ubicación del archivo temporal cargado en el servidor.
    // ruta : Especifica la ubicación permanente donde se desea guardar el archivo.
    move_uploaded_file($archivo, $ruta);

    // Crear la consulta SQL utilizando las variables
    // De esta manera se guarda en la base de datos
    $sql = "INSERT INTO publicaciones (Titulo, Descripcion, Contenido, Imagen) VALUES ('$Titular', '$DescripcionT', '$ContenidoT', '$ruta')";
                    
$estado = mysqli_query($conexion, $sql);
if($estado)
{
    header("Location: interfaz.php");
}else{
    echo "No se publico"."<br>";
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);//devuelve el error
}

}
?>
