<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'inv-suppliers-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>
        
        <?php
		if($model->isNewRecord){
			$estado=0;
			$mnpio=0;
			$colonia=0;
		}else{
			$estado=$model->people->estado;
			$mnpio=$model->people->mnpio;
			$colonia=$model->people->col;
		}

	?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'company_name'); ?>

	<?php echo $form->textFieldControlGroup($model,'first_name'); ?>
        
	<?php echo $form->textFieldControlGroup($model,'last_name'); ?>
        
	<?php echo $form->textFieldControlGroup($model,'phone_number'); ?>
        
	<?php echo $form->textFieldControlGroup($model,'email'); ?>
        
	<?php echo $form->textFieldControlGroup($model,'address1'); ?>
        
	<?php echo $form->textFieldControlGroup($model,'address2'); ?>
    
    <div class="form-group">   
	<?php echo $form->labelEx($model,'estado',array('class'=>'control-label')); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
			"ajax"=>array(
				"url"=>$this->createUrl("delMunByEst"),
				"type"=>"POST",
				"update"=>"#InvSuppliers_mnpio,#InvSuppliers_col",
			),
		);
            $data = $model->getMenuEstados();
            $this->widget('ext.select2.ESelect2',array(
                    'model'=>$model,
                    'attribute'=>'estado',
                    'data'=>$data,
                    'htmlOptions'=>$htmlOptions,
                )
            ); 
            ?>
        <?php echo $form->error($model,'estado');?>
        </div>
    
    <div class="form-group">    
	<?php echo $form->labelEx($model,'mnpio',array('class'=>'control-label')); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
			"ajax"=>array(
				"url"=>$this->createUrl("coloniaByDelMun"),
				"type"=>"POST",
				"update"=>"#InvSuppliers_col",
			),
		);
            $data = $model->getMenuDelMun($estado);
            $this->widget('ext.select2.ESelect2',array(
                    'model'=>$model,
                    'attribute'=>'mnpio',
                    'data'=>$data,
                    'htmlOptions'=>$htmlOptions,
                )
            ); 
            ?>
        <?php echo $form->error($model,'mnpio');?>
        </div>
    
    <div class="form-group">    
	<?php echo $form->labelEx($model,'col',array('class'=>'control-label')); ?>
        <?php 
            $htmlOptions=array(
			'class'=>'form-control',
			'ajax' =>array('type'=>'POST',
                            'url'=>$this->createUrl('codigoByColonia'), //url to call.
                            'update'=>'#'.CHtml::activeId($model, 'cp'), //selector to update
                        ),
		);
            $data = $model->getMenuColonia($estado,$mnpio);
            $this->widget('ext.select2.ESelect2',array(
                    'model'=>$model,
                    'attribute'=>'col',
                    'data'=>$data,
                    'htmlOptions'=>$htmlOptions,
                )
            ); 
            ?>
        <?php echo $form->error($model,'col');?>
        </div>
        
	<?php
		$htmlOptions=array(
			'class'=>'form-control',
			'maxlength'=>10,
			
		);
	?>

	<?php echo $form->dropDownListControlGroup($model,'cp',$model->getMenuCp($estado,$mnpio,$colonia),$htmlOptions);?>
        
	<?php echo $form->textAreaControlGroup($model,'comments'); ?>

	<?php echo BsHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
