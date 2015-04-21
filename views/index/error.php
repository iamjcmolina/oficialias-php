<?php
/* @var $exception Exception */
/* @var $content string */
?>
<?php ob_start(); ?>
	<h2>Error <?= $exception->getCode()>0? $exception->getCode() : '' ?></h2>
	
	<div class="alert alert-danger">
		<?= $exception->getMessage() ?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/main-layout.php'; ?>
