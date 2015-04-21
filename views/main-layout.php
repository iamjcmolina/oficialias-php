<?php
/* @var $content string */
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
				<?= $content ?>
			</div>
			
			<footer class="row"><!-- Pie de pagina -->
				<p class="pull-left">Derechos Reservados 2015</p>
				<p class="pull-right">74-71-32-86-90<br>registrocivil@guerrero.gob.mx</p>
				<div class="clearfix"></div>
			</footer>
			
		</div>
	</body>
</html>
