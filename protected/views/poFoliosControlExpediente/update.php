<?php
$this->breadcrumbs=array(
	'Protocolo Ordinario Folios Control Expedientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Expedientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Expediente','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle de Expediente','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración P.O. Expedientes','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Expediente '.$model->id) ?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>