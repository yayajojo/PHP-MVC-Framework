<?php
/** @var $model \app\models\RegisterModel */
use app\forms\RegisterForm;
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
     <?= $form->field($model, 'password','password')?>
     <?= $form->field($model, 'password_confirmation','password')?>
    <button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end()?>