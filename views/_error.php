<?php
/**
 * @var $this app\core\View
*/
$this->title = 'Error';
?>
<h1><?= $exception->getCode().': ' . $exception->getMessage() ?></h1>
