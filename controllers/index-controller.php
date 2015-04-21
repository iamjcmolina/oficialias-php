<?php

/**
 * Pagina de bienvenida
 */
function actionIndex(){
	require './views/index/index.php';
}


/**
 * Pagina para mostrar los errores de la aplicacion
 */
function actionError(){
	/* @var $exception Exception */
	
	// Consultando el error ocurrido almacenado en la sesion (si lo hay)
	$exception = isset($_SESSION['exception'])? $_SESSION['exception'] : null;
	// Eliminando el error de la sesion, de no hacerlo, mas tarde podriamos 
	// ver el mensaje de error aun cuando dicho error no haya ocurrido
	unset($_SESSION['exception']);
	// Si no hay error que mostrar, no mostrar la pagina
	if( empty($exception) ){
		exit();
	}

	require './views/index/error.php';
}
