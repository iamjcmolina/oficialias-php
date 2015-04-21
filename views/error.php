<?php
/* @var $errorInesperado string */
/* @var $content string */
?>
<?php ob_start(); ?>
	<h2>Error</h2>

	<div class="alert alert-danger">
		<?= $errorInesperado ?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require './views/main-layout.php'; ?>
