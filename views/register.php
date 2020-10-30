<?php $form  = app\core\form\Form::begin("POST", "/register");?>
    <div class="form-row">
        <div class="col">
            <?= $form->field($model, 'firstname')?>
        </div>
        <div class="col">
            <?= $form->field($model, 'lastname')?>
        </div>
    </div>
     <?= $form->field($model, 'email')?>
     <?= $form->field($model, 'password')?>
     <?= $form->field($model, 'password_confirmation')?>
    <button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end()?>