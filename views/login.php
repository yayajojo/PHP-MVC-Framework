<?php
/** 
 * @var $model \app\models\LoginModel
 * @var $this mayjhao\phphmvc\View
*/
use mayjhao\phphmvc\form\Form;
use app\fields\LoginField;
$this->title = 'Login';
?>
<?php $form = Form::begin("POST", "/login") ?>

<?= $form->field(new LoginField($model,'email')) ?>
<?= $form->field(new LoginField($model, 'password'))->passwordField() ?>
<button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end() ?>