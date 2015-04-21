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

require './views/error.php';
