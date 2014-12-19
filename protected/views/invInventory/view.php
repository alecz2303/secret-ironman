<?php
$this->breadcrumbs=array(
	'Inv Inventories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado InvInventory','url'=>array('index')),
	array('label'=>'Nuevo InvInventory','url'=>array('create')),
	array('label'=>'Actualización InvInventory','url'=>array('update','id'=>$model->id)),
	array('label'=>'Borrar InvInventory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administración InvInventory','url'=>array('admin')),
);
?>

<h1>Detalle InvInventory #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-bordered detail-view'),
	'attributes'=>array(
		'id',
		'item_id',
		'user',
		'date',
		'comment',
		'inventory',
	),
)); ?>
