 <?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Clientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Cliente','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Cliente','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración de Clientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Cliente '.$model->id) ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>