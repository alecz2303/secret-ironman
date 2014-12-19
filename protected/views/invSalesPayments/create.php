<?php
$this->breadcrumbs=array(
	'Inv Sales Payments'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listado InvSalesPayments','url'=>array('index')),
	array('label'=>'Administración InvSalesPayments','url'=>array('admin')),
);
?>

<h1>Nuevo InvSalesPayments</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>