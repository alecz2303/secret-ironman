<?php
$this->breadcrumbs=array(
	'Inv Peoples',
);

$this->menu=array(
	array('label'=>'Nuevo InvPeople','url'=>array('create')),
	array('label'=>'Administración InvPeople','url'=>array('admin')),
);
?>

<h1>Inv Peoples</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
