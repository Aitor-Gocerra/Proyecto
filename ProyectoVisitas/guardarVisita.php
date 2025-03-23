<?php
//Recoge la información del formulario
	$idJesuita= $_POST["idJesuita"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$ipLugar= $_POST["ip"]; 

//Conecta con la base de datos ($conexión)
	include 'conexion.php';
	
	echo $idJesuita;
	
//Cadena de caracteres de la consulta sql	
	$sql="INSERT INTO visita (idJesuita,ip) VALUES(".$idJesuita.",'".$ipLugar."');";   //completa lo que falta
	echo $sql; //envía el contenido de la variable al navegador, o sea, muestra la información en el navegador
	
	
// Ejecutamos la consulta SQL almacenada en la variable $sql
	if ($conexion->query($sql) === TRUE) {  
		// Vamos a verificar que la consulta afecto a alguna fila de la base de datos
		if ($conexion->affected_rows > 0) {  
			// affected_rows > 0 me va a controlar que la consulta tiene una fila al menos.
			echo "<h2>Visita realizada</h2>";
			// Si la visita se guardó correctamente, redirige según la ip seleccionada.
			// Aquí usas la IP o el lugar seleccionado para determinar la redirección, creamos una variable para jugar con un SWITCH CASE.
			
			$paginaRedireccion = '';
			
			//DAMOS VALORES DE OPCIONES AL SWITCH CASE:
			switch ($ipLugar) {
            case '192.168.1.2':
                $paginaRedireccion = 'NuevaYork.html'; // Redirige a una página específica
                break;
            case '192.168.1.6':
                $paginaRedireccion = 'BuenosAires.html'; // Redirige a otra página
                break;
            case '192.168.1.4':
				$paginaRedireccion = 'Londres.html';
				break;
			case '192.168.1.9':
				$paginaRedireccion = 'Sidney.html';
            default:
                echo "<h1>La pagina esta en construccion</h1>";
                break;
			}
			// Redirige a la página correspondiente
			header("Location: " . $paginaRedireccion);
			exit(); // FORZAMOS EL DETENIMIENTO
		} else {  
			// Si no se afectó ninguna fila, indicamos que no hubo cambios
			echo "<h2>No se realizaron cambios</h2>";  
		}  
	} else {  
		// Si la consulta falló, mostramos el mensaje de error con la descripción del problema
		echo "<h2>Error en la consulta: " . $conexion->error . "</h2>";  
}


//Cierra la conexión
	$conexion->close();
?>
