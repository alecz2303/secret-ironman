 <?php
$this->breadcrumbs=array(
	'Testimonio Infonavit'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Testimonios Infonavit','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio Infonavit','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización Testimonio Infonavit','url'=>array('update','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Testimonio Infonavit','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonios Infonavit','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Testimonio Infonavit '.$model->id) ?>

<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		'id',
		'escritura',
		'anno',
		'nombre',
		'fecha_entrega',
		'recibe',
	),
)); ?>
