<?php
/* @var $content string */
?>
<?php ob_start(); ?>
	<img class="img-responsive center-block" src="img/home.png" alt="Bienvenido" >
<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/main.php'; ?>
