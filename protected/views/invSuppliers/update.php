 <?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Proveedores','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Proveedor','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Proveedor','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Proveedores','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Proveedor '.$model->id) ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>