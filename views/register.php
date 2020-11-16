<?php
/** 
 * @var $model app\models\RegisterModel 
 * @var $this  mayjhao\phphmvc\View
 * */
use mayjhao\phphmvc\form\Form;
use app\fields\RegisterField;
$this->title = 'Register';
?>
<?php 
$form  = Form::begin("POST", "/register");?>
    <div class="form-row">
        <div class="col">
            <?= $form->field(new RegisterField($model,'firstname'))?>
        </div>
        <div class="col">
            <?= $form->field(new RegisterField($model,'lastname'))?>
        </div>
    </div>
     <?= $form->field(new RegisterField($model,'email'))?>
     <?= $form->field(new RegisterField($model,'password'))->passwordField()?>
     <?= $form->field(new RegisterField($model,'password_confirmation'))->passwordField()?>
    <button type="submit" class="btn btn-primary">Sign in</button>
<?php $form->end()?>