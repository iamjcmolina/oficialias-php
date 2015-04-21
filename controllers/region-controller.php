<?php

/**
 * Pagina de Gestion de Regiones
 */
function actionIndexRegion(){
	/* @var $regiones Region[] */

	$regiones = Region::findAll();

	require './views/region/index.php';

}


/**
 * Pagina para crear una Region
 */
function actionCrearRegion(){
	/* @var $region Region */
	
	$region = new Region();
	if( isset($_POST['Region']) ){
		$region->fill($_POST['Region']);
		// Llamada a metodo del modelo para insertar una region, valida los datos internamente
		if ( $region->insert() ){
			// Redireccionando a pagina de regiones
			header('Location: index.php?route=regiones');
			exit();
		}
	}

	require './views/region/crear.php';
}
