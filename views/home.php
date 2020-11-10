<?php

use app\core\Application;
?>
<?php if (Application::$app->isGuest()) : ?>
    <h1>Please register or login</h1>
<?php else : ?>
    <h1>Welcome to <?= Application::$app->user->disPlayName() ?>'s Homepage</h1>
<?php endif; ?>