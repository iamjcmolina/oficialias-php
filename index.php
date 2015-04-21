<?php 
/* @var $defaultRoute string */

// Inclusion de clases de modelo
require './models/Model.php';
require './models/Region.php';
require './controllers/Controller.php';
require './controllers/IndexController.php';
require './controllers/RegionController.php';

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$defaultRoute = 'index/index';
$defaultController = 'index';
$defaultAction = 'index';

// Obtener la ruta solicitada
$route = isset($_GET['route'])? $_GET['route'] : $defaultRoute;
$route = explode('/', $route);

// Obtenemos los componentes de la ruta
$controllerId = isset($route[0])? $route[0] : $defaultController;
$actionId = isset($route[1])? $route[1] : $defaultAction;

// Obtenemos el nombre de la clase a usar
$className = str_replace('-', ' ', $controllerId);
$className = ucwords($className);
$className = str_replace('', ' ', $className);
$className .= 'Controller';

// Obtenemos el metodo a ejecutar
$actionMethod = str_replace('-', ' ', $actionId);
$actionMethod = ucwords($actionMethod);
$actionMethod = str_replace('', ' ', $actionMethod);
$actionMethod = "action$actionMethod";

// Obtenemos la ruta del archivo controlador
$controllerPathFile='./controllers/'. $className.'.php';

// Enrutamiento a accion
try{
	if( !is_file($controllerPathFile) ){
		throw new Exception("$controllerId no es un controlador valido",404);
	}
	if( !is_callable(array($className, $actionMethod)) ){
		throw new Exception("La accion '$actionId' que usted solicito, no existe",404);
	}
	$objectoController=new $className();
	$objectoController->$actionMethod();
} catch (Exception $ex) {
	// Almacenando excepcion en la sesion
	$_SESSION['exception'] = $ex;
	// Ejecutando pagina web para mostrar errores
	$controller = new IndexController();
	$controller->actionError();
}
