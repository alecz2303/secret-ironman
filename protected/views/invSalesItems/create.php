 <?php
$this->breadcrumbs=array(
	'Salidas'=>array('invSales/index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Salidas','url'=>array('invSales/index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Salidas','url'=>array('invSales/admin')),
);
?>

<?php echo BsHtml::pageHeader('Nueva','Salida de Inventario') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model));