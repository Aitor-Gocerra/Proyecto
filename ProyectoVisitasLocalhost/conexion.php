<?php
// Datos de conexión
define("SERVIDOR",'localhost');
define("USUARIO",'root');
define("PASSWORD",'');
define("BBDD",'jesuitas');

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
