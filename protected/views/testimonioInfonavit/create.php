 <?php
$this->breadcrumbs=array(
	'Testimonio Infonavit'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Testimonios Infonavit','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonio Infonavit','url'=>array('admin')),
);
?>


<?php echo BsHtml::pageHeader('Nuevo','Testimonio Infonavit') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>