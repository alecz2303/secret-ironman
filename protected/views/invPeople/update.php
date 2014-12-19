<?php
$this->breadcrumbs=array(
	'Inv Peoples'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'Listado InvPeople','url'=>array('index')),
	array('label'=>'Nuevo InvPeople','url'=>array('create')),
	array('label'=>'Detalle InvPeople','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administración InvPeople','url'=>array('admin')),
);
?>

<h1>Actualizaci&oacute;n InvPeople <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>