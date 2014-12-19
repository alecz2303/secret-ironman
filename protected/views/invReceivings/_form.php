<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'inv-receivings-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'receiving_time',array('class'=>'span5','readonly'=>'readonly')); ?>

	<?php echo $form->textFieldControlGroup($model,'suplier_id',array('class'=>'span5','readonly'=>'readonly')); ?>

	<?php echo $form->textFieldControlGroup($model,'user',array('class'=>'span5','maxlength'=>50,'readonly'=>'readonly')); ?>

	<?php echo $form->textAreaControlGroup($model,'comment'); ?>

	<?php echo BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
