<?php

/**
 * Modelo de la tabla Region.
 * Encapsula la logica de negocio de para manejo de la tabla region.
 * @author Charles
 */
class Region extends Model{
	
	/**
	 * Id de la region
	 * @var int
	 */
	public $id = '';
	/**
	 * Clave de la region
	 * @var int
	 */
	public $clave = '';
	/**
	 * Nombre de la region
	 * @var string
	 */
	public $nombre = '';
	
	
	/**
	 * Devuelve el conjunto de todos los registros de la tabla region
	 * @return Region[] Registros de la tabla region
	 */
	public static function findAll(){
		$dbConnection = parent::connectDataBase();
		$regiones = array();
		// Ejecutando el query y almacenado el conjunto de registros de regiones
		$resultsetRegiones = $dbConnection->query('SELECT * FROM region');
		// Recorriendo el conjunto de registros de regiones
		while( $currentRegion = $resultsetRegiones->fetch_assoc() ){
			$region = new Region();
			$region->fill($currentRegion);
			array_push($regiones, $region);
		}
		return $regiones;
	}


	/**
	 * Comprueba si el modelo contiene valores no validos en sus campos
	 * @param int $clave Clave de la region
	 * @param string $nombre Nombre de la region
	 * @return boolean true si no hay errores, false en caso contrario
	 */
	public function validate(){
		$this->cleanErrors();
		if( empty($this->clave) ){
			$this->addError('Olvidaste proporcionar la clave de la Region');
		}
		if( !is_numeric($this->clave) ){
			$this->addError('La clave de la Region debe ser numerica');
		}
		if( empty($this->nombre) ){
			$this->addError('Olvidaste proporcionar el nombre de la Region');
		}
		return !$this->hasErrors();
	}


	/**
	 * Inserta un nuevo registro de en la tabla region
	 * @param int $clave Clave de la region
	 * @param string $nombre Nombre de la region
	 * @return boolean true si el registro se inserto correctamente,
	 *  false en caso contrario
	 */
	public function insert(){
		$dbConnection = parent::connectDataBase();
		// Validando los campos antes de usarlos en el query de insercion de registro
		if( $this->validate() ){
			// Escapamos los valores para evitar ataques como la inyeccion de sql, Javascript, etc.
			$clave = $dbConnection->real_escape_string($this->clave);
			$nombre = $dbConnection->real_escape_string($this->nombre);
			// Preparando el query para obtener los registro de regiones
			$query = "INSERT INTO region(clave, nombre) VALUES ($clave, '$nombre')";
			if( !$dbConnection->query($query) ){
				$this->addError('Fallo la ejecucion de la consulta, favor de revisar');
			}
		}
		return !$this->hasErrors();
	}
	
	
}
