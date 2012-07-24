<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'users-login-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
        <p class="mycaption">Вход в систему</p>
	<div class="row">
		<?php echo $form->textField($model,'eve_id',array('placeholder'=>'EVE ID')); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'eve_key', array('placeholder'=>'EVE KEY')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton('Войти', array('class'=>'btn-inverse')); ?>
            <p><a href="#">Вопросы?</a></p>
	</div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->