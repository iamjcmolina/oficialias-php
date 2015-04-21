<?php
/* @var $dbConnection mysqli */
/* @var $query string */
/* @var $resultsetRegiones mysqli_result */
/* @var $currentRegion array */
/* @var $regiones array */

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$dbConnection = null;
$query = '';
$resultsetRegiones = null;
$currentRegion = array();
$regiones = array();

// Conectandonos a la base de datos
$dbConnection = new mysqli('localhost', 'root', '', 'control_oficialias');
// Comprobando si hubo un error al conectarse a la base de datos
if( $dbConnection->connect_error ){
	// Almacenando mensaje de error en la session
	$_SESSION['errorInesperado'] = 'Base de datos no disponible, favor de revisar';
	// Redireccionando a pagina web para mostrar errores
	header('Location: error.php');
	exit();
} else {
	// Preparando el query para obtener los registro de regiones
	$query = 'SELECT * FROM region';
	// Ejecutando el query y almacenado el conjunto de registros de regiones
	$resultsetRegiones = $dbConnection->query($query);
	// Recorriendo el conjunto de registros de regiones
	while( $currentRegion = $resultsetRegiones->fetch_assoc() ){
		array_push($regiones, $currentRegion);
	}
}
?>
<!DOCTYPE html>
<html><!-- Este documento usa etiquetas semanticas de HTML5 -->
	<head>
		<!-- Codificacion de caracteres -->
		<meta charset="utf-8" >
		<!-- Titulo del documento -->
		<title>Control de Oficialias</title>
		<!-- Icono del documento (Favicon) -->
		<link href="img/favicon.png" rel="icon" type="image/png" >
	</head>
	<body>
		
		<header><!-- Cabecera de la pagina  -->
			<h1>Sistema de Control de Oficialias</h1>
			<nav><!-- Vinculos de navegacion -->
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="regiones.php">Regiones </a></li>
				</ul>
			</nav>
		</header>
		
		<div><!-- Contenido principal de la pagina web -->
			<h2>Gestion de Regiones</h2>
			
			<a href="crear-region.php">Crear region</a>
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Clave</th>
						<th>Nombre</th>
						<th colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($regiones as $region){ ?>
						<tr>
							<td><?= $region['id'] ?></td>
							<td><?= $region['clave'] ?></td>
							<td><?= $region['nombre'] ?></td>
							<td><a href="#" >Editar</a></td>
							<td><a href="#">Borrar</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
		<footer><!-- Pie de pagina -->
			<p>Derechos Reservados 2015</p>
			<p>74-71-32-86-90<br>registrocivil@guerrero.gob.mx</p>
		</footer>
		
	</body>
</html>
