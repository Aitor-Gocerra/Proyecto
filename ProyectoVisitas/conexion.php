<?php
// Datos de conexión
define('SERVIDOR', '');  // Cambia 'localhost' por tu servidor
define('USUARIO', '');  // Reemplaza con tu usuario de la BD
define('PASSWORD', ''); // Reemplaza con tu contraseña
define('BBDD', ''); // Reemplaza con el nombre de la base de datos

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
