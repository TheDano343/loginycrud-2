<?php
require 'conexion.php';
// Verificamos si se ha enviado el formulario y el botón de inicio de sesión ha sido presionado
if(isset($_POST['login'])) {

    // Verificar si los campos del formulario están definidos
    if(isset($_POST['correo']) && isset($_POST['contrasenia'])) {
        
        //$usuario y $contrasena:  es el usuario y contraseña el cual se le esta registrando
        // Se obtienen los valores del formulario
        $usuario = $_POST['correo'];
        $contrasena = $_POST['contrasenia'];

        // Consultar la base de datos para obtener los datos del usuario
        //$sql: se coloca para realizar la sentencia de sql
        //correo: es de donde se van a recuperar los registros 
        //$usuario: se invoca la variable de donde se va a escribir el texto
        $consulta = "SELECT * FROM login WHERE correo = '$usuario'";
       
        //$conexion : Se coloca para hacer la conexion
        //$sql: Se coloca para realizar la sentencia de sql
        //mysqli_query: Combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultados
        //$conexion: Se conecta a la base de datos 
        //$consulta: Y ejecuta el query
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se encontró un usuario con ese correo
        //mysqli_num_rows: visualiza cuantas filas realiza la consulta
        //$resultado: y se hace todo esto en el resultado
        //==: si es igual a 1, devuelva un resultado
        if(mysqli_num_rows($resultado) == 1) {
            // mysqli_fetch_assoc : Es usada para regresar una representación asociativa de la siguiente fila en el resultado, representado por el parámetro resultado , donde cada llave en la matriz representa el nombre de las columnas en el resultado.
            $fila = mysqli_fetch_assoc($resultado);

            // Verificar si la contraseña ingresada coincide con la contraseña hasheada en la base de datos
            //password_verify(): para verificar si la contraseña ingresada coincide con la contraseña almacenada en la base de datos. Dependiendo del resultado, se muestra un mensaje apropiado al usuario.
            //$contrasena: Es la contraseña que el usuario ha proporcionado en el formulario de inicio de sesión. Esta es la contraseña que se está intentando verificar.
            //$fila['contrasenia']: Es la contraseña almacenada en la base de datos para el usuario correspondiente al correo electrónico proporcionado. En el contexto del código, $fila es el resultado de la consulta a la base de datos para obtener los datos del usuario. 
            //$fila['contrasenia'] específicamente representa la contraseña almacenada para ese usuario en la columna de la base de datos llamada "contrasenia".

            //En resumen, password_verify($contrasena, $fila['contrasenia']) es la forma en que se verifica si la contraseña ingresada por el usuario es correcta en comparación con la contraseña almacenada en la base de datos para ese usuario específico.
            if(password_verify($contrasena, $fila['contrasenia'])) {
                // echo "Inicio de sesión exitoso. ¡Bienvenido!";
                header("Location: crud/index.php");

            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }
}
?>

