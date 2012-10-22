<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php
  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
   'htmlOptions'=>array('class'=>'form-vertical'),
	'enableClientValidation'=>true,
    //   'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <fieldset>
        <legend>Login</legend>
     <p>Please fill out the following form with your login credentials:</p>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
        <section  class="controls">
		<?php echo $form->textField($model,'username',array('class'=>'')); ?>
		<?php echo $form->error($model,'username',array('class'=>'help-inline')); ?>
         </section>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
                <section  class="controls">
		<?php echo $form->passwordField($model,'password',array('class'=>'')); ?>
		<?php echo $form->error($model,'password',array('class'=>'help-inline')); ?>
                </section>
	</div>
        <p class="help-block">
			Hint: You may login with    demo/demo  or   admin/admin.
		</p>

	<div class="help-block" >
        <?php echo $form->checkBox($model,'rememberMe',array('class'=>'')); ?>
        <?php echo $form->label($model,"rememberMe",array('class'=>'checkbox help-inline')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>


</div><!-- form -->
