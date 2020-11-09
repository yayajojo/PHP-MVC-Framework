<?php

/**@var $model \app\models\LoginModel*/
use app\forms\LoginForm;
?>
<?php $form = (new LoginForm())->begin("POST", "/login") ?>

<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password', 'password') ?>
<button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end() ?>