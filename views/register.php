<?php
/** 
 * @var $model app\models\RegisterModel 
 * @var $this  app\core\View
 * */
use app\forms\RegisterForm;
$this->title = 'Register';
?>
<?php 
$form  = (new RegisterForm())->begin("POST", "/register");?>
    <div class="form-row">
        <div class="col">
            <?= $form->field($model, 'firstname')?>
        </div>
        <div class="col">
            <?= $form->field($model, 'lastname')?>
        </div>
    </div>
     <?= $form->field($model, 'email')?>
     <?= $form->field($model, 'password')->passwordField()?>
     <?= $form->field($model, 'password_confirmation')->passwordField()?>
    <button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end()?>