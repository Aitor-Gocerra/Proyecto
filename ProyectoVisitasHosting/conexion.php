<?php
// Datos de conexión
define("SERVIDOR",'http://13.1daw.esvirgua.com/');
define("USUARIO",'user1daw_13');
define("PASSWORD",'7d!};5MoMVPH');
define("BBDD",'user1daw_BD1-13');

// Crear conexión con la base de datos
$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

// Configurar el juego de caracteres a UTF-8
$conexion->set_charset("utf8");

// Desactivar los errores de MySQLi para evitar mostrar información sensible
$controlador = new mysqli_driver();
$controlador->report_mode = MYSQLI_REPORT_OFF;

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
