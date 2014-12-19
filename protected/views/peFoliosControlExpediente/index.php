<?php
$this->breadcrumbs=array(
	'Protocolo Especial Folios Control Expedientes',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Expediente','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración P.E. Expedientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Protocolo Especial Control Expedientes') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
