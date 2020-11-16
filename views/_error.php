<?php
/**
 * @var $this mayjhao\phphmvc\View
*/
$this->title = 'Error';
?>
<h1><?= $exception->getCode().': ' . $exception->getMessage() ?></h1>
