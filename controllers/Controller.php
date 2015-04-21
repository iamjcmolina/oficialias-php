<?php

/**
 * Controlador base
 *
 * @author Charles
 */
abstract class Controller {
	
	public $layout = 'main';
	
	
	/**
	 * Genera la vista solicitada con los parametros solicitados con el layout establecido
	 * @param string $view Nombre de la vista
	 * @param array $params Variables a proporcionar a la vista
	 */
	protected function render($view, array $params=[]){
		ob_start();
		$this->renderPartial($view, $params);
		$content = ob_get_clean();
		require "./views/layouts/$this->layout.php";
	}
	
	
	/**
	 * Genera la vista solicitada con los parametros solicitados sin un layout
	 * @param type $view Nombre de la vista
	 * @param array $params Variables a proporcionar a la vista
	 */
	protected function renderPartial($view, array $params=[]){
		$controllerId = $this->getControllerId();
		extract($params);
		require "./views/$controllerId/$view.php";
	}
	
		
	/**
	 * Redirecciona a la operacion proporcionada con los parametros get proporcionados
	 * @param array $params Ruta en el indice 0 y parametros asociativos get de la operacion
	 */
	protected function redirect(array $params){
		$route = isset($params[0])? $params[0] : '';
		unset($params[0]);
		$queryString = empty($params)? '' : '&'.http_build_query($params);
		$url = "index.php?route=$route$queryString";
		header("Location: $url");
		exit();
	}
	
	
	/**
	 * Devuelve el identificador de ruta del controlador en ejecucion
	 * @return string Identificador del controlador
	 */
	protected function getControllerId(){
		// Obtener el nombre de la clase en ejecucion
		$className = get_class($this);
		
		// Obtener la posicion donde comienza la palabra Controller
		if( ($pos=strpos($className, 'Controller'))!==false ){
			// Eliminar la palabra Controller
			$className = substr($className, 0, $pos);
		}
		// Reemplazamos las letras mayusculas con un guion y la misma letra
		$className = preg_replace('/([A-Z])/', '-${1}', $className);
		// Eliminamos los guiones que puedan aparecer al inicio de la cadena
		$className = ltrim($className, '-');
		// Convertimos la cadena en minusculas
		$className = strtolower($className);
		return $className;
	}
	
	
}
