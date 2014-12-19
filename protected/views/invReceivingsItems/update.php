<?php
$this->breadcrumbs=array(
	'Recepciónes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'Listado Recepciónes','url'=>array('invReceivings/index')),
	array('label'=>'Nueva Recepción','url'=>array('create')),
	//array('label'=>'Detalle Recepción','url'=>array('invReceivings/view','id'=>$model->id)),
	array('label'=>'Administración Recepciónes','url'=>array('invReceivings/admin')),
);
?>

<h1>Actualizaci&oacute;n Recepción <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_1',array('model'=>$model)); ?>