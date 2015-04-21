<?php
/* @var $dbConnection mysqli */
/* @var $query string */
/* @var $clave string */
/* @var $nombre string */
/* @var $erroresValidacion array */

// Activando reporte de errores fatales y en tiempo de compilacion
error_reporting(E_ERROR | E_COMPILE_ERROR);
// Activando el uso de sesiones
session_start();

// Inicializacion de variables
$dbConnection = null;
$query = '';
$clave = '';
$nombre = '';
$erroresValidacion = array();

// Conectandonos a la base de datos
$dbConnection = new mysqli('localhost', 'root', '', 'control_oficialias');
// Comprobando si hubo un error al conectarse a la base de datos
if( $dbConnection->connect_error ){
	// Almacenando mensaje de error en la session
	$_SESSION['errorInesperado'] = 'Base de datos no disponible, favor de revisar';
	// Redireccionando a pagina web para mostrar errores
	header('Location: error.php');
	exit();
}else{
	if( isset($_POST['clave'], $_POST['nombre']) ){
		$clave = $_POST['clave'];
		$nombre = $_POST['nombre'];
		// Validando los campos antes de usarlos en el query de insercion de registro
		if( empty($clave) ){
			array_push($erroresValidacion, 'Olvidaste proporcionar la clave de la Region');
		}
		if( !is_numeric($clave) ){
			array_push($erroresValidacion, 'La clave de la Region debe ser numerica');
		}
		if( empty($nombre) ){
			array_push($erroresValidacion, 'Olvidaste proporcionar el nombre de la Region');
		}
		if ( empty($erroresValidacion) ){
			// Escapamos los valores para evitar ataques como la inyeccion de sql, Javascript, etc.
			$clave = $dbConnection->real_escape_string($clave);
			$nombre = $dbConnection->real_escape_string($nombre);
			// Preparando el query para obtener los registro de regiones
			$query = "INSERT INTO region(clave, nombre) VALUES ($clave, '$nombre')";
			if( $dbConnection->query($query) ){
				// Redireccionando a pagina de regiones
				header('Location: regiones.php');
				exit();
			}else{
				array_push($erroresValidacion, 'Fallo la ejecucion de la consulta, favor de revisar');
			}
		}
	}
}
?>
<!DOCTYPE html>
<html><!-- Este documento usa etiquetas semanticas de HTML5 -->
	<head>
		<!-- Codificacion de caracteres -->
		<meta charset="utf-8">
		<!-- IExplorer; modo compatibilidad mas alto -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Escalado; moviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Para bootstrap las tres etiquetas anteriores deben ser las primeras en ser usadas -->

		<!-- Titulo del documento -->
		<title>Control de Oficialias</title>
		<!-- Icono del documento (Favicon) -->
		<link href="img/favicon.png" rel="icon" type="image/png" >
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/system-style.css" >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- HTML5 shiv y Respond.js para soportar HTML5 y media queries en Internet Explorer 8 -->
		<!-- ADVERTENCIA: Respond.js no funciona si ves la pagina usando file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="page" class="container"><!-- Contenedor global de la pagina -->
			
			<header class="row"><!-- Cabecera de la pagina  -->
				<h1>Sistema de Control de Oficialias</h1>
				<nav class="navbar navbar-inverse navbar-static-top"><!-- Vinculos de navegacion -->
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed"
											data-toggle="collapse"
											data-target="#main-navbar"
											><!-- Boton para pantallas pequeñas -->
								<span class="sr-only">Mostrar/Ocultar navegacion</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">Oficialias</a>
						</div>
						<div class="collapse navbar-collapse" id="main-navbar">
							<ul class="nav navbar-nav"><!-- Vinculos a paginas web -->
								<li><a href="regiones.php">Regiones</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			
			<div id="content"><!-- Contenido principal de la pagina web -->
				<h2>Crear region</h2>
				
				<ol class="breadcrumb">
					<li><a href="index.php">Inicio</a></li>
					<li><a href="regiones.php">Regiones</a></li>
					<li class="active">Crear region</li>
				</ol>

				<!-- Mostramos errores de validacion, si los hay -->
				<?php if( !empty($erroresValidacion) ){ ?>
					<div class="alert alert-danger">
						<p><b>Por favor corrija los siguientes problemas</b></p>
						<ul>
							<?php foreach($erroresValidacion as $error){ ?>
								<li><?= $error ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
				
				<form method="post" class="form-horizontal"><!-- Formulario para crear region -->
					<div class="form-group">
						<label for="clave" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-4">
							<input id="clave" class="form-control" name="clave" type="text" value="<?= $clave ?>" >
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-4">
							<input id="nombre" class="form-control" name="nombre" type="text" value="<?= $nombre ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</form>
			</div>
			
			<footer class="row"><!-- Pie de pagina -->
				<p class="pull-left">Derechos Reservados 2015</p>
				<p class="pull-right">74-71-32-86-90<br>registrocivil@guerrero.gob.mx</p>
				<div class="clearfix"></div>
			</footer>
			
		</div>
	</body>
</html>
