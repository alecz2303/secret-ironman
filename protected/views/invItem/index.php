 <?php
$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Item','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Item','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Items') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
