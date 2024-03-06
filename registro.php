<?php
require 'conexion.php';

// Validamos que el formulario y que el boton login haya sido presionado, todo esto si isset tiene el name de button
if(isset($_POST['registro']))
{
    
    //Se crea una varible y se iguala a la funcion 'POST',y en el post se coloca el dato que esta en el 'name'
    //correo, contrasenia: son los campos a los cuales se les va a insertar
    $usuario = $_POST['correo'];
    $contrasena = $_POST['contrasenia'];

    $sql_verificar = "SELECT correo FROM login where correo = '$usuario'";
                      
    $verificar_registro = mysqli_query($conexion, $sql_verificar);

    if(mysqli_num_rows($verificar_registro) > 0)
    {
        echo "El correo ya existe";
    }else{
    //$usuario y $contrasena:  es el usuario y contraseña el cual se le esta registrando
    //$contrasenia_fuerte: Esta variable encriptara la contraseña 
    //password_hash(): crea un nuevo hash de contraseña usando un algoritmo de hash fuerte de único sentido
    //PASSWORD_DEFAULT: Usar el algoritmo bcrypt. Observa que esta constante está diseñada para cambiar siempre que se añada un algoritmo nuevo y más fuerte a PHP.
    $contrasenia_fuerte = password_hash($contrasena, PASSWORD_DEFAULT);
   
    //$sql: se coloca para realizar la sentencia de sql
    //Se pone contrasenia_fuerte en $sql ya que de esa variable se va a encriptar
    //correo, contrasenia: son los campos a los cuales se les va a insertar
    //$usuario y $contrasenia_fuerte:  son las variables de los campos de los cuales se les va a insertar
    $sql = "INSERT INTO login(correo, contrasenia) VALUES ('$usuario', '$contrasenia_fuerte')";
    
    // mysqli_query : es usada para simplificar la acción de ejecutar una consulta sobre la base de datos representada por el parámetro
    //$conexion : Se coloca para hacer la conexion de la base de datps de la cual se obtendra informacion
    //$sql: se coloca para realizar la sentencia de sql y insertar los datos que se van a colocar
    $resultado = mysqli_query($conexion, $sql);
        if($resultado)
        {
            echo "Se insertaron correctamente";
        }else{
            echo "Se inserto incorrectamente los datos."."<br>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);//devuelve el error
        }
    }
}   
?>