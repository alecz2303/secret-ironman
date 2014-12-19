<?php
$this->breadcrumbs=array(
	'Estatus Expedientes Protocolo Especial'=>array('index'),
	'Nuevo',
	);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Estatus Exp P.E.','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Estatus Exp P.E.','url'=>array('admin')),
	);
	?>

	<?php echo BsHtml::pageHeader('Nuevo','Expediente') ?>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>