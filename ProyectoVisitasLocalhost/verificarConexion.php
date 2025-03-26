<?php
	session_start();
	
	$nombre=$_POST["nombre"];
	$codigo=$_POST["codigo"];

	//Conecta con la base de datos ($conexión)
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

	$sql2 = "SELECT codigo FROM jesuita WHERE nombre='".$nombre."';";
	$resultado2 = $conexion -> query($sql2);

	if( $conexion->affected_rows>0){
		$fila=$resultado2->fetch_array();
		$codigoEncriptado = $fila['codigo']; // Guarda el valor en la variable
	echo "El código es: " . $codigoEncriptado; // Muestra el resultado
	}

	/*if (password_verify($codigo, $codigoEncriptado)) {
		echo 'La contraseña es válida!';
	} else {
		echo 'La contraseña no es válida.';
	}*/

	//SQL
		$sql="SELECT idJesuita,nombre FROM jesuita WHERE nombre='".$nombre."' AND codigo='".$codigoEncriptado."';";
		$resultado=$conexion->query($sql);

	//Inicio de Sesión
		if( $conexion->affected_rows>0){
			$fila=$resultado->fetch_array();
			$_SESSION["idJesuita"]=$fila["idJesuita"];
			$_SESSION["nombre"]=$fila["nombre"];
			echo "<h3><a href=".'visita.php'.">Ya Puede Hacer Visitas</a></h3>";
		}else{
			echo "<h2>DATOS INCORRECTOS --> </h2>";
			echo "<h3><a href=".'jesuitas.html'.">Volver a Intentarlo</a></h3>";
		}

	$conexion->close();
?>