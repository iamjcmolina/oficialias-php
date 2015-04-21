<?php


/**
 * Controlador de gestion de registros de la tabla region
 *
 * @author Charles
 */
class RegionController extends Controller{
	
	
	/**
	 * Pagina de Gestion de Regiones
	 */
	public function actionIndex(){
		/* @var $regiones Region[] */

		$regiones = Region::findAll();
		
		$this->render('index',[
			'regiones' => $regiones,
		]);
	}


	/**
	 * Pagina para crear una Region
	 */
	public function actionCrear(){
		/* @var $region Region */

		$region = new Region();

		if( isset($_POST['Region']) ){
			$region->fill($_POST['Region']);
			// Llamada a metodo del modelo para insertar una region, valida los datos internamente
			if ( $region->insert() ){
				// Redireccionando a pagina de regiones
				$this->redirect(['region/index']);
			}
		}
		
		$this->render('crear',[
			'region' => $region,
		]);
	}
	
	
}
