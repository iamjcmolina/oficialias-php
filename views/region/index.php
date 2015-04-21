<?php
/* @var $regiones Region[] */
/* @var $content string */
?>
<?php ob_start(); ?>
	<h2>Gestion de Regiones</h2>

	<ol class="breadcrumb">
		<li><a href="index.php?route=index">Inicio</a></li>
		<li class="active">Regiones</li>
	</ol>

	<a href="index.php?route=crear-region">Registrar</a>
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>Id</th>
				<th>Clave</th>
				<th>Nombre</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($regiones as $region){ ?>
				<tr>
					<td><?= $region->id ?></td>
					<td><?= $region->clave ?></td>
					<td><?= $region->nombre ?></td>
					<td><a href="#" >Editar</a></td>
					<td><a href="#">Borrar</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/main.php'; ?>