<?php
$this->breadcrumbs=array(
	'Testimonio Infonavit'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Testimonios Infonavit','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio Infonavit','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Testimonio Infonavit','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonios Infonavit','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Testimonio Infonavit '.$model->id) ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>