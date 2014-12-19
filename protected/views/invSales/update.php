 <?php
$this->breadcrumbs=array(
	'Salidas de Inventario'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Salidas','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nueva Salida','url'=>array('invSalesItems/create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Salidas','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Salidas','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Salidas '.$model->id) ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>