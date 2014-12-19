<?php
$this->breadcrumbs=array(
	'Inv Peoples'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado InvPeople','url'=>array('index')),
	array('label'=>'Nuevo InvPeople','url'=>array('create')),
	array('label'=>'Actualización InvPeople','url'=>array('update','id'=>$model->id)),
	array('label'=>'Borrar InvPeople','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administración InvPeople','url'=>array('admin')),
);
?>

<h1>Detalle InvPeople #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-bordered detail-view'),
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'phone_number',
		'email',
		'address1',
		'address2',
		'estado',
		'mnpio',
		'col',
		'cp',
		'comments',
	),
)); ?>
