<?php
use app\core\Application;
/** @var $this app\core\View */
$this->title = 'Home';
?>
<?php if (Application::$app->isGuest()) : ?>
    <h1>Please register or login to visit your homepage</h1>
<?php else : ?>
    <h1>Welcome to <?= Application::$app->user->disPlayName() ?>'s Homepage</h1>
<?php endif; ?>