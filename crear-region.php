<?php
/* @var $dbConnection mysqli */
/* @var $query string */
/* @var $clave string */
/* @var $nombre string */
/* @var $erroresValidacion array */

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$dbConnection = null;
$query = '';
$clave = '';
$nombre = '';
$erroresValidacion = array();

// Conectandonos a la base de datos
$dbConnection = new mysqli('localhost', 'root', '', 'control_oficialias');
// Comprobando si hubo un error al conectarse a la base de datos
if( $dbConnection->connect_error ){
	// Almacenando mensaje de error en la session
	$_SESSION['errorInesperado'] = 'Base de datos no disponible, favor de revisar';
	// Redireccionando a pagina web para mostrar errores
	header('Location: error.php');
	exit();
}else{
	if( isset($_POST['clave'], $_POST['nombre']) ){
		$clave = $_POST['clave'];
		$nombre = $_POST['nombre'];
		// Validando los campos antes de usarlos en el query de insercion de registro
		if( empty($clave) ){
			array_push($erroresValidacion, 'Olvidaste proporcionar la clave de la Region');
		}
		if( !is_numeric($clave) ){
			array_push($erroresValidacion, 'La clave de la Region debe ser numerica');
		}
		if( empty($nombre) ){
			array_push($erroresValidacion, 'Olvidaste proporcionar el nombre de la Region');
		}
		if ( empty($erroresValidacion) ){
			// Escapamos los valores para evitar ataques como la inyeccion de sql, Javascript, etc.
			$clave = $dbConnection->real_escape_string($clave);
			$nombre = $dbConnection->real_escape_string($nombre);
			// Preparando el query para obtener los registro de regiones
			$query = "INSERT INTO region(clave, nombre) VALUES ($clave, '$nombre')";
			if( $dbConnection->query($query) ){
				// Redireccionando a pagina de regiones
				header('Location: regiones.php');
				exit();
			}else{
				array_push($erroresValidacion, 'Fallo la ejecucion de la consulta, favor de revisar');
			}
		}
	}
}

require './views/crear-region.php';
