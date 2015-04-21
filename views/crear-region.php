<?php
/* @var $region Region */
/* @var $ex Exception */
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
	<?php if( $region->hasErrors() ){ ?>
		<div class="alert alert-danger">
			<p><b>Por favor corrija los siguientes problemas</b></p>
			<ul>
				<?php foreach($region->errors as $error){ ?>
					<li><?= $error ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>

	<form method="post" class="form-horizontal"><!-- Formulario para crear region -->
		<div class="form-group">
			<label for="region-clave" class="col-sm-2 control-label">Clave</label>
			<div class="col-sm-4">
				<input id="region-clave" class="form-control" name="Region[clave]" type="text" value="<?= $region->clave ?>" >
			</div>
		</div>
		<div class="form-group">
			<label for="region-nombre" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-4">
				<input id="region-nombre" class="form-control" name="Region[nombre]" type="text" value="<?= $region->nombre ?>" >
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
