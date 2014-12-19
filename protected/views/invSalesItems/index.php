<?php
$this->breadcrumbs=array(
	'Inv Sales Items',
);

$this->menu=array(
	array('label'=>'Nuevo InvSalesItems','url'=>array('create')),
	array('label'=>'Administración InvSalesItems','url'=>array('admin')),
);
?>

<h1>Inv Sales Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
