<?php
	
	$nombreJesuita = $_POST["nombre"];
	$codigo = $_POST["codigo"];
	session_start();
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
	
	// Buscar el idJesuita según el nombre y código
	$sql = "SELECT idJesuita FROM jesuita WHERE nombre = '".$nombreJesuita."' AND codigo = '".$codigo."'";
	echo $sql;
	echo $nombreJesuita;
	echo $codigo;
	$resultado = $conexion->query($sql);  
	$fila = $resultado->fetch_array();
	
	if ($resultado->num_rows > 0){
        // Si el jesuita fue encontrado, obtener el idJesuita
		$idJesuita = $fila["idJesuita"];
		
        $_SESSION["nombre"] = $nombreJesuita;
		echo "<br>";
		echo 'sesión nombre:'. $_SESSION["nombre"];
		echo "<br/>";
		$_SESSION["idJesuita"] = $idJesuita;
		echo 'sesión ide:'.$_SESSION["idJesuita"];
		echo "<h2>Jesuita encontrado.</h2>";
        echo '<h3><a href="visitas.php">Registra tu visita</a></h3>';
        
    } else {
        echo "<h2>Jesuita no encontrado.</h2>";
        echo '<h3><a href="inicioSesion.html">Volver</a></h3>';
    }
?>