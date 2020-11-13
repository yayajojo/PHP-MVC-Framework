<?php 
/** 
 * @var $form app\core\form\Form
 * @
 * @var $model app\core
*/
use app\core\form\Form;
use app\fields\ContactField;
use app\fields\MessageField;
$this->title = 'Contact';
?>
<h1>Contact admin:</h1>
<?php $form = Form::begin('post','/contact')?>
<?php echo $form->field(new ContactField($model,'name'))?>
<?php echo $form->field(new ContactField($model,'email'))?>
<?php echo $form->field(new MessageField($model,'message'))?>
<button type="submit" class="btn btn-primary">Send</button>
<?php $form->end();?>