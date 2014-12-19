<?php
$this->breadcrumbs=array(
	'Po Status Exps'=>array('index'),
	'Nuevo',
	);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado PoStatusExp','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración PoStatusExp','url'=>array('admin')),
	);
	?>

	<?php echo BsHtml::pageHeader('Nuevo','Expediente') ?>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>