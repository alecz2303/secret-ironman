 <?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Item','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Item','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Nuevo','Item') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>