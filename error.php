<?php
/* @var $exception Exception */

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializando variables
$exception = null;

// Consultando el error ocurrido almacenado en la sesion (si lo hay)
$exception = isset($_SESSION['exception'])? $_SESSION['exception'] : null;
// Eliminando el error de la sesion, de no hacerlo, mas tarde podriamos 
// ver el mensaje de error aun cuando dicho error no haya ocurrido
unset($_SESSION['exception']);
// Si no hay error que mostrar, no mostrar la pagina
if( empty($exception) ){
	exit();
}

require './views/error.php';
