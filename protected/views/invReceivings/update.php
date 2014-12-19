 <?php
$this->breadcrumbs=array(
	'Recepciónes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado InvReceivings','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nueva Recepción','url'=>array('invReceivingsItems/create')),
	array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle Recepción','url'=>array('view','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Recepciones','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','Recepción '.$model->id) ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>