<?php
$this->breadcrumbs=array(
	'Po Status Exps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
	);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado PoStatusExp','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo PoStatusExp','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle PoStatusExp','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración PoStatusExp','url'=>array('admin')),
	);
	?>

	<?php echo BsHtml::pageHeader('Actualización','Expediente '.$model->id) ?>
	<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>