 <?php
$this->breadcrumbs=array(
	'Protocolo Especial Folios Control Expedientes'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Expedientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración P.E. Expedientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Nuevo','Expediente') ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>