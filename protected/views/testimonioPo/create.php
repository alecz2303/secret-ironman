 <?php
$this->breadcrumbs=array(
	'Testimonio Protocolo Ordinario'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Testimonios P.O.','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonios P.O.','url'=>array('admin')),
);
?>
<?php echo BsHtml::pageHeader('Nuevo','Protocolo Ordinario') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>