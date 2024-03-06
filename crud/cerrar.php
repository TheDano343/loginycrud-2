<?php

session_start();
session_destroy();


if( isset($_SESSION["correo"]))
{
    Header("Location: ../login.html");
}

?>