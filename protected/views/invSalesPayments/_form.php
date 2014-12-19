<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'inv-sales-payments-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'sales_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'payment_type',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'payment_amount',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Salvar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
