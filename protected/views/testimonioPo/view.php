<?php
$this->breadcrumbs=array(
	'Testimonio Protocolo Ordinario'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Testimonios P.O.','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio P.O.','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización Actualización Testimonio P.O.','url'=>array('update','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Testimonio P.O.','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonios P.O','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Testimonio Protocolo Ordinario '.$model->id) ?>
<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		//'id',
		'escritura',
		'anno',
		'nombre',
		'fecha_entrega',
		'recibe',
	),
)); ?>
