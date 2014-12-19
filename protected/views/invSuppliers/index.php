 <?php
$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Proveedor','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Proveedores','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Proveedores') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
