 <?php
$this->breadcrumbs=array(
	'Testimonio Protocolo Ordinario'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Testimonios P.O.','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio P.O.','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Testimonio P.O.','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonios P.O.','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Testimonio Protocolo Ordinario '.$model->escritura) ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>