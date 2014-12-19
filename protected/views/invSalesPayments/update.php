<?php
$this->breadcrumbs=array(
	'Inv Sales Payments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'Listado InvSalesPayments','url'=>array('index')),
	array('label'=>'Nuevo InvSalesPayments','url'=>array('create')),
	array('label'=>'Detalle InvSalesPayments','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administración InvSalesPayments','url'=>array('admin')),
);
?>

<h1>Actualizaci&oacute;n InvSalesPayments <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>