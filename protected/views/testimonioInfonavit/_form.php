 <?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'testimonio-infonavit-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'escritura',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldControlGroup($model,'anno',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldControlGroup($model,'nombre',array('class'=>'span5','maxlength'=>260)); ?>

	<?php if (!$model->isNewRecord): ?>
            
        <div class="form-group">
        <?php echo $form->labelEx($model,'fecha_entrega',array('class'=>'control-label'));?>
        <?php 
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'attribute'=>'fecha_entrega',
                'model'=>$model,
                'language'=>'es',
                'htmlOptions'=>array('class'=>'form-control'),
                'options'=>array(
                    'dateFormat'=>'yy-mm-dd', 
                ),
            ));
        ?>
        <?php echo $form->error($model,'fecha_entrega'); ?>
        </div>

	<?php echo $form->textFieldControlGroup($model,'recibe',array('class'=>'span5','maxlength'=>260)); ?>
        
        <?php endif; ?>

	<?php echo BsHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
