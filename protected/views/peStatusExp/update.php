<?php
$this->breadcrumbs=array(
	'Estatus Expedientes Protocolo Especial'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
	);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Estatus Exp P.E.','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Estatus Exp P.E.','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Estatus Exp P.E.','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Estatus Exp P.E.','url'=>array('admin')),
	);
	?>

	<?php echo BsHtml::pageHeader('Actualización','Expediente '.$model->id) ?>
	<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>