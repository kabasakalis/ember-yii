<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>
<div class="contact-success alert alert-info">
  <!--   <a class='close' data-dismiss='alertd'>×</a> -->
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>



<div class="form">

<?php

    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
     'htmlOptions'=>array('class'=>'form-vertical'),
     'errorMessageCssClass'=>'help-inline',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <fieldset>
        <legend>Contact</legend>

 <p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,NULL,NULL,array('class'=>'alert alert-error')); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
        <section class="controls">
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name',array('class'=>'help-inline')); ?>
            </section>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
        <section class="controls">
            <!-- Note that at the time of writing this yii 1.1.10 does not support email input field,but the latest commit of yii
                in Github has been updated to support  $form->emailField  (CActiveForm) -->
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email',array('class'=>'help-inline')); ?>
            </section>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'subject',array('class'=>'control-label')); ?>
        <section class="controls">
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject',array('class'=>'help-inline')); ?>
            </section>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'body',array('class'=>'control-label')); ?>
          <section class="controls">
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body',array('class'=>'help-inline')); ?>
                </section >
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
            <div class="control-group">

		<?php echo $form->labelEx($model,'verifyCode'); ?>

		
                <section class="controls">
		<?php echo $form->textField($model,'verifyCode'); ?>


		<?php echo $form->error($model,'verifyCode',array('class'=>'help-inline')); ?>
            </section>


</div>
        <?php $this->widget('CCaptcha',array('buttonType'=>'button',
                                                                                           'buttonOptions'=>array('class'=>'btn'))); ?>
            <?php endif; ?>
        <div class="help-block">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>

        
		<div class="form-actions">
		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary')); ?>
	</div>
    </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>