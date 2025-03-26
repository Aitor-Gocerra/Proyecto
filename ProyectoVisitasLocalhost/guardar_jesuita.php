<?php
	// Datos de conexión
	define("SERVIDOR",'localhost');
	define("USUARIO",'root');
	define("PASSWORD",'');
	define("BBDD",'jesuitas');

	// Crear conexión con la base de datos
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

	// Obtener los datos del formulario
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$nombreAlumno = $_POST['nombreAlumno'];
	$firma = $_POST['firma'];
	$firmaIngles = $_POST['firmaIngles'];

	// Encriptar el código con password_hash
	$codigoEncriptado = password_hash($codigo, PASSWORD_DEFAULT);

	// Insertar los datos en la tabla
	$sql = "INSERT INTO jesuita (codigo, nombre, nombreAlumno, firma, firmaIngles)
			VALUES ('$codigoEncriptado', '$nombre', '$nombreAlumno', '$firma', '$firmaIngles')";

	if ($conexion->query($sql) === TRUE) {
		echo "Nuevo jesuita ingresado exitosamente";
		echo "<h3><a href=".'inicioSesion.html'.">Ya Puede Iniciar Sesion</a></h3>";
	} else {
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}

	$conexion->close();
?>
