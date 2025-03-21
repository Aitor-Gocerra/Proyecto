<?php
	session_start();
	include 'conexion.php';
	
	$nombreJesuita = $_SESSION["nombre"];
	$idJesuita = $_SESSION["idJesuita"];
	//echo "hola mundo";
	if (isset($_SESSION["nombre"])) {
    echo "existe";
	} else {
    echo "no existe";
	}
	echo "<br>";
	//echo $idJesuita;
	echo "<br>";
	

	$sql="SELECT ip,lugar FROM lugar;"; //Prepara la consulta
	$resultado=$conexion->query($sql);	//Ejecuta la consulta sql
	
//Cierra la conexión
	$conexion->close();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Visitas</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="guardarVisita.php" method="post">
		<h1>Hola, <?php echo $nombreJesuita ; ?></h1>
		<label for="idJesuita">Lugar:</label>
        <select name="ip">
			<?php
				while($fila=$resultado->fetch_array()){
					echo'<option value = "'.$fila["ip"].'">'.$fila["lugar"].'</option>';
				}
			?>
		 </select>
		 <br>
        <button type="submit">Enviar</button>
		<input type="hidden" name="idJesuita" value="<?php echo $idJesuita; ?>">
    </form>
</body>
</html>
