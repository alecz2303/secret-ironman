<?php
$this->breadcrumbs=array(
	'Testimonio Infonavit',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio Infonavit','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonio Infonavit','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Testimonios Infonavit') ?>

<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
