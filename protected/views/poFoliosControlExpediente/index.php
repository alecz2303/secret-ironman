<?php
$this->breadcrumbs=array(
	'Protocolo Ordinario Folios Control Expedientes',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Expediente','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración P.O. Expedientes','url'=>array('admin')),
);
?>

<h1>Protocolo Ordinario Control Expedientes</h1>

<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
