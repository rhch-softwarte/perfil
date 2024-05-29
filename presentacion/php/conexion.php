<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$servidor = "localhost";
$usuario   = 'root';
$contraseña    = 'root91';
$dbconnect = mysqli_connect($servidor, $usuario, $contraseña);

if (!$dbconnect) {
    die('No se pudo conectar : ' . mysqli_error());
} else {
    echo 'Conexión exitosa';
    mysqli_select_db($dbconnect, 'quejas');
}
?>
