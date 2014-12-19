<?php
$this->breadcrumbs=array(
	'Inv Sales Payments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado InvSalesPayments','url'=>array('index')),
	array('label'=>'Nuevo InvSalesPayments','url'=>array('create')),
	array('label'=>'Actualización InvSalesPayments','url'=>array('update','id'=>$model->id)),
	array('label'=>'Borrar InvSalesPayments','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administración InvSalesPayments','url'=>array('admin')),
);
?>

<h1>Detalle InvSalesPayments #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-bordered detail-view'),
	'attributes'=>array(
		'id',
		'sales_id',
		'payment_type',
		'payment_amount',
	),
)); ?>
