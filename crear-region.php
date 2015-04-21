<?php
/* @var $clave string */
/* @var $nombre string */
/* @var $erroresValidacion array */
/* @var $ex Exception */

// Agregando librerias
require './models/model-base.php';
require './models/region-table.php';

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$clave = '';
$nombre = '';
$erroresValidacion = array();

try{
	if( isset($_POST['clave'], $_POST['nombre']) ){
		$clave = $_POST['clave'];
		$nombre = $_POST['nombre'];
		// Llamada a funcion del modelo para insertar una region, valida los datos internamente
		$erroresValidacion = insertRegion($clave, $nombre);
		if ( empty($erroresValidacion) ){
			// Redireccionando a pagina de regiones
			header('Location: regiones.php');
			exit();
		}
	}
}catch(Exception $ex){
	// Almacenando la excepcion en la session
	$_SESSION['exception'] = $ex;
	// Redireccionando a pagina web para mostrar errores
	header('Location: error.php');
	exit();
}

require './views/crear-region.php';
