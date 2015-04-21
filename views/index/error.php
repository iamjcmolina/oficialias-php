<?php
/* @var $exception Exception */
?>
<h2>Error <?= $exception->getCode()>0? $exception->getCode() : '' ?></h2>

<div class="alert alert-danger">
	<?= $exception->getMessage() ?>
</div>
