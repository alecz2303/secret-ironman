<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'inv-sales-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'sale_time',array('readonly'=>'readonly')); ?>

	<?php echo $form->textFieldControlGroup($model,'customer_id',array('readonly'=>'readonly')); ?>

	<?php echo $form->textFieldControlGroup($model,'user',array('maxlength'=>50,'readonly'=>'readonly')); ?>

	<?php echo $form->textAreaControlGroup($model,'comment'); ?>

	<?php echo BsHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>