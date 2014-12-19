<?php
/* @var $this TblUserController */
/* @var $model TblUser */
?>

<?php
$this->breadcrumbs=array(
	'Tbl Users'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de TblUser', 'url'=>array('index')),
    array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo TblUser', 'url'=>array('create')),
    array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización TblUser', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar TblUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que quiere borrar este item?')),
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración TblUser', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','TblUser '.$model->id) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'age',
		'location',
	),
)); ?>