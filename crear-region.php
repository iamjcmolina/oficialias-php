<?php
/* @var $region Region */
/* @var $ex Exception */

// Agregando librerias
require './models/Model.php';
require './models/Region.php';

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$region = new Region();

try{
	if( isset($_POST['Region']) ){
		$region->fill($_POST['Region']);
		// Llamada a metodo del modelo para insertar una region, valida los datos internamente
		if ( $region->insert() ){
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
