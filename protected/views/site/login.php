<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'users-login-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'eve_id',array('placeholder'=>'EVE ID')); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'eve_key', array('placeholder'=>'EVE KEY')); ?>
	</div>

	<div class="row buttons ">
		<?php echo CHtml::submitButton('Submit', array('class'=>'btn-inverse')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->