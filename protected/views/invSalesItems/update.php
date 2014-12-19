<?php
$this->breadcrumbs=array(
	'Salidas'=>array('invSales/index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'Listado InvSalesItems','url'=>array('index')),
	array('label'=>'Nuevo InvSalesItems','url'=>array('create')),
	array('label'=>'Detalle InvSalesItems','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administración InvSalesItems','url'=>array('admin')),
);
?>

<h1>Actualizaci&oacute;n InvSalesItems <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>