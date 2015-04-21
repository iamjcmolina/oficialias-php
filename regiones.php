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

require './views/regiones.php';
