<?php
$this->breadcrumbs=array(
	'Inv Sales Payments',
);

$this->menu=array(
	array('label'=>'Nuevo InvSalesPayments','url'=>array('create')),
	array('label'=>'Administración InvSalesPayments','url'=>array('admin')),
);
?>

<h1>Inv Sales Payments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
