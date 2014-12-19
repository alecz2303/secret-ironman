 <?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Proveedores','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Proveedores','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Nuevo','Proveedor') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>