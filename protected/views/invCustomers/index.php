 <?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Cliente','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración de Clientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Clientes') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
