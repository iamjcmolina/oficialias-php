<?php
/* @var $errorInesperado string */

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializando variables
$errorInesperado = '';

// Consultando el error ocurrido almacenado en la sesion (si lo hay)
$errorInesperado = isset($_SESSION['errorInesperado'])? $_SESSION['errorInesperado'] : '';
// Eliminando el error de la sesion, de no hacerlo, mas tarde podriamos 
// ver el mensaje de error aun cuando dicho error no haya ocurrido
unset($_SESSION['errorInesperado']);
// Si no hay error que mostrar, no mostrar la pagina
if( empty($errorInesperado) ){
	exit();
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
			<h2>Error</h2>
			
			<p>
				<?= $errorInesperado ?>
			</p>
		</div>
		
		<footer><!-- Pie de pagina -->
			<p>Derechos Reservados 2015</p>
			<p>74-71-32-86-90<br>registrocivil@guerrero.gob.mx</p>
		</footer>
		
	</body>
</html>
