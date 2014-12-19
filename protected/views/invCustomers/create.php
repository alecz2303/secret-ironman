 <?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Clientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Clientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Nuevo','Cliente') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>