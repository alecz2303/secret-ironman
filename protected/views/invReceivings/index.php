 <?php
$this->breadcrumbs=array(
	'Recepciónes',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nueva Recepción','url'=>array('invReceivingsItems/create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Recepciónes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Recepciónes') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
