<?php
use mayjhao\phphmvc\Application;
/** @var $this mayjhao\phphmvc\View */
$this->title = 'Home';
?>
<?php if (Application::$app->isGuest()) : ?>
    <h1>Please register or login to visit your homepage</h1>
<?php else : ?>
    <h1>Welcome to <?= Application::$app->user->disPlayName() ?>'s Homepage</h1>
<?php endif; ?>