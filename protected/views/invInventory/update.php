<?php
$this->breadcrumbs=array(
	'Inv Inventories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'Listado InvInventory','url'=>array('index')),
	array('label'=>'Nuevo InvInventory','url'=>array('create')),
	array('label'=>'Detalle InvInventory','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administración InvInventory','url'=>array('admin')),
);
?>

<h1>Actualizaci&oacute;n InvInventory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>