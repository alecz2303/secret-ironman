<?php
$this->breadcrumbs=array(
	'Inv Inventories'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listado InvInventory','url'=>array('index')),
	array('label'=>'Administración InvInventory','url'=>array('admin')),
);
?>

<h1>Nuevo InvInventory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>