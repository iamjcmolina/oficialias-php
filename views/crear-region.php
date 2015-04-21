<?php
/* @var $dbConnection mysqli */
/* @var $query string */
/* @var $clave string */
/* @var $nombre string */
/* @var $erroresValidacion array */
/* @var $content string */
?>
<?php ob_start(); ?>
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
<?php $content = ob_get_clean(); ?>
<?php require './views/main-layout.php'; ?>
