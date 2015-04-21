<?php 
/* @var $defaultRoute string */

// Inclusion de librerias
require './models/Model.php';
require './models/Region.php';
require './controllers/index-controller.php';
require './controllers/region-controller.php';

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$defaultRoute = 'index';

// Obtener la ruta solicitada
$route = isset($_GET['route'])? $_GET['route'] : $defaultRoute;
// Enrutamiento a accion
try{
	if( $route == 'index' ){
		actionIndex();
	}else if( $route == 'index-region' ){
		actionIndexRegion();
	}else if( $route == 'crear-region' ){
		actionCrearRegion();
	}else{
		throw new Exception('La ruta solicitada no es valida', 404);
	}
} catch (Exception $ex) {
	// Almacenando excepcion en la sesion
	$_SESSION['exception'] = $ex;
	// Ejecutando pagina web para mostrar errores
	actionError();
}
