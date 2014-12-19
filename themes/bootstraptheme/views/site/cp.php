<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Códigos Postales';
$this->breadcrumbs=array(
	'Códigos Postales de México',
);
?>
<h1>C&oacute;digos Postales de M&eacute;xico</h1>

        <?php
            $estado=0;
            $mnpio=0;
            $colonia=0;
	?>


<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

        <?php echo $form->labelEx($model,'estado'); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
			"ajax"=>array(
				"url"=>$this->createUrl("delMunByEst"),
				"type"=>"POST",
				"update"=>"#CpForm_mnpio,#CpForm_col",
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
            ?><br /><br />
        <?php echo $form->error($model,'estado');?>
            
        <?php echo $form->labelEx($model,'mnpio'); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
			"ajax"=>array(
				"url"=>$this->createUrl("coloniaByDelMun"),
				"type"=>"POST",
				"update"=>"#CpForm_col",
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
            ?><br /><br />
        <?php echo $form->error($model,'mnpio');?>
         
        <?php echo $form->labelEx($model,'col'); ?>
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
            ?><br /><br />
        <?php echo $form->error($model,'col');?>
        
	<?php
		$htmlOptions=array(
			'class'=>'form-control',
			'maxlength'=>10,
			
		);
	?>

	<?php echo $form->dropDownListControlGroup($model,'cp',$model->getMenuCp($estado,$mnpio,$colonia),$htmlOptions);?>

<?php $this->endWidget(); ?>