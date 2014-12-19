<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'receivings_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'item_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'serialnumber',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'qty_purchased',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'item_cost_price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'item_unit_price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'discount_percent',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
