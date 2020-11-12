<?php
/** 
 * @var $model \app\models\LoginModel
 * @var $this app\core\View
*/
use app\forms\LoginForm;
$this->title = 'Login';
?>
<?php $form = (new LoginForm())->begin("POST", "/login") ?>

<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>
<button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end() ?>