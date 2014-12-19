 <?php
$this->breadcrumbs=array(
	'Salidas de Inventario',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nueva Salida','url'=>array('invSalesItems/create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Salidas','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Salidas Inventario') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
