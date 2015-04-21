<?php
/* @var $regiones array */
/* @var $ex Exception */

// Agregando librerias
require './models/model-base.php';
require './models/region-table.php';

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$regiones = array();

try{
	$regiones = findAllRegiones();
} catch (Exception $ex) {
	// Almacenando la excepcion en la session
	$_SESSION['exception'] = $ex;
	// Redireccionando a pagina web para mostrar errores
	header('Location: error.php');
	exit();
}

require './views/regiones.php';
