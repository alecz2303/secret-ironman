<?php
$this->breadcrumbs=array(
	'Protocolo Ordinario Folios Control Expedientes'=>array('index'),
	$model->ep,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Expedientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Expediente','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización de Expediente','url'=>array('update','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Expediente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración P.O. Expedientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Expediente EP#'.$model->ep) ?>

<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		'canc',
		'ep',
		'libro',
		'folio_ini',
		'folio_fin',
		'fecha',
		'acto',
		'enajenante',
		'adquirente',
		'responsable',
		'expediente_DBA',
		'fecha_Registro',
	),
)); ?>
 