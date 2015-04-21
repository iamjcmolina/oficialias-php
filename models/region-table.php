<?php

/* 
 * Funciones que encapsulan la logica de negocio para manipular la tabla region.
 */


/**
 * Devuelve el conjunto de todos los registros de regiones
 * @return array Conjunto de todos los registro de regiones
 */
function findAllRegiones(){
	$dbConnection = connectDataBase();
	$regiones = array();
	// Ejecutando el query y almacenado el conjunto de registros de regiones
	$resultsetRegiones = $dbConnection->query('SELECT * FROM region');
	// Recorriendo el conjunto de registros de regiones
	while( $currentRegion = $resultsetRegiones->fetch_assoc() ){
		array_push($regiones, $currentRegion);
	}
	return $regiones;
}


/**
 * Devuelve los errores en los campos de la tabla
 * @param int $clave Clave de la region
 * @param string $nombre Nombre de la region
 * @return array Errores de los valores proporcionados
 */
function validateRegion($clave, $nombre){
	$errors = array();
	if( empty($clave) ){
		array_push($errors, 'Olvidaste proporcionar la clave de la Region');
	}
	if( !is_numeric($clave) ){
		array_push($errors, 'La clave de la Region debe ser numerica');
	}
	if( empty($nombre) ){
		array_push($errors, 'Olvidaste proporcionar el nombre de la Region');
	}
	return $errors;
}


/**
 * Inserta un nuevo registro en la tabla region
 * @param int $clave Clave de la region
 * @param string $nombre Nombre de la region
 * @return array Errores de validacion de los valores proporcionados
 */
function insertRegion($clave, $nombre){
	$dbConnection =  connectDataBase();
	// Validando los campos antes de usarlos en el query de insercion de registro
	$errors = validateRegion($clave, $nombre);
	if( empty($errors) ){
		// Escapamos los valores para evitar ataques como la inyeccion de sql, Javascript, etc.
		$clave = $dbConnection->real_escape_string($clave);
		$nombre = $dbConnection->real_escape_string($nombre);
		// Preparando el query para obtener los registro de regiones
		$query = "INSERT INTO region(clave, nombre) VALUES ($clave, '$nombre')";
		if( !$dbConnection->query($query) ){
			array_push($errors, 'Fallo la ejecucion de la consulta, favor de revisar');
		}
	}
	return $errors;
}
