<?php
$this->breadcrumbs=array(
	'Inv Inventories',
);

$this->menu=array(
	array('label'=>'Nuevo InvInventory','url'=>array('create')),
	array('label'=>'Administración InvInventory','url'=>array('admin')),
);
?>

<h1>Inv Inventories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
