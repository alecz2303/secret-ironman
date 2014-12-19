<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'inv-item-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'name'); ?>
     
     <div class="form-group">      
        <?php echo $form->labelEx($model,'category',array('class'=>'control-label')); ?>
	<?php 
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    'model'=>$model,
            'attribute'=>'category',
	    'source'=>$this->createUrl('selectCategory'),
	    // additional javascript options for the autocomplete plugin
	    'options'=>array(
	            'showAnim'=>'fold',
	    ),
            'htmlOptions'=>array('class'=>'form-control','maxlength'=>255),
	));
        ?>
        <?php echo $form->error($model,'category');?>
    </div>

    <div class="form-group">   
	<?php echo $form->labelEx($model,'supplier_id',array('class'=>'control-label')); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
		);
            $data = $model->getMenuSuppliers();
            $this->widget('ext.select2.ESelect2',array(
                    'model'=>$model,
                    'attribute'=>'supplier_id',
                    'data'=>$data,
                    'htmlOptions'=>$htmlOptions,
                )
            ); 
            ?>
        <?php echo $form->error($model,'supplier_id');?>
    </div>
    
	<?php echo $form->textFieldControlGroup($model,'description'); ?>

	<?php echo $form->textFieldControlGroup($model,'cost_price'); ?>

	<?php echo $form->textFieldControlGroup($model,'unit_price'); ?>

	<?php echo $form->textFieldControlGroup($model,'reorder_level'); ?>

	<?php echo BsHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
