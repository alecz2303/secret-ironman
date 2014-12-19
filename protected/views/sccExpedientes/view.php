<?php
/* @var $this SccExpedientesController */
/* @var $model SccExpedientes */
?>

<?php
$this->breadcrumbs=array(
	'Scc Expedientes'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración SccExpedientes', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Expediente '.$model->Expediente) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'Fecha',
		'Expediente',
		'Operacion',
		'Instrumento',
		'Abogado',
		//'Tipo',
	),
)); ?>

<hr>
<div class="row">
<div class="docs col-md-5">
<h3>Documentos Escaneados</h3>
	<?php 
		if(is_file(Yii::getPathOfAlias('application').'/views/sccExpedientes/files/'.$model->Expediente.'.php')){
			$this->renderPartial('files/'.$model->Expediente, array('model'=>$model));
		}else{
			echo "Este expediente no tiene Documentos escaneados.";
		}		
	?>
</div>
<div class="docs col-md-6">
<h3>Check List</h3>
	<?php 
		if(is_file(Yii::getPathOfAlias('application').'/views/sccExpedientes/chklst/'.$model->Tipo.'.php')){
			$this->renderPartial('chklst/'.$model->Tipo, array('model'=>$model));
		}	
	?>
</div>
</div>