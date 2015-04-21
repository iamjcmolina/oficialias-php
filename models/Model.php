<?php
/**
 * Funcionalidad basica para reutilizar en todos los modelos hijos
 */
abstract class Model{
	
	
	/**
	 * Errores de validacion
	 * @var array 
	 */
	public $errors = array();
	
	
	/**
	 * Abre una conexion a la base de datos y devuelve el enlace a ella
	 * @return mysqli Enlace de conexion a la base de datos
	 */
	protected static function connectDataBase(){
		 $dbConnection = new mysqli('localhost', 'root', '', 'control_oficialias');
		 // Comprobando si hubo un error al conectarse a la base de datos
		 if( $dbConnection->connect_error ){
			 throw new Exception('Base de datos no disponible, favor de revisar');
		 }
		 return $dbConnection;
	}
	
	
	/**
	 * Agrega un mensaje de error al conjunto de errores del modelo
	 * @param string $error Mensaje de error
	 */
	public function addError($error){
		array_push($this->errors, $error);
	}
	
	
	/**
	 * Comprueba si hay errores de validacion
	 * @return boolean true si hay algun error, false en caso contrario
	 */
	public function hasErrors(){
		return !empty($this->errors);
	}
	
	
	/**
	 * Elimina todos los errores de validacion
	 */
	public function cleanErrors(){
		$this->errors = array();
	}
	
	
	/**
	 * Asigna los valores para cada uno de los campos del modelo
	 * @param array $values Array asociativo de campos y sus valores
	 */
	public function fill(array $values){
		foreach($values as $campo=>$valor){
			if( isset($this->$campo) ){
				$this->$campo = $valor;
			}
		}
	}
	
	
}
