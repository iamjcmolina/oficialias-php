<?php

/*
 * Funciones para reutilizar en todos los modelos de tablas
 */


/**
 * Abre una conexion a la base de datos y devuelve el enlace a ella
 * @return mysqli Enlace de conexion a la base de datos
 */
function connectDataBase(){
	 $dbConnection = new mysqli('localhost', 'root', '', 'control_oficialias');
	 // Comprobando si hubo un error al conectarse a la base de datos
	 if( $dbConnection->connect_error ){
		 throw new Exception('Base de datos no disponible, favor de revisar');
	 }
	 return $dbConnection;
}
