 <?php
$this->breadcrumbs=array(
	'Recepciónes'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Recepciónes','url'=>array('invReceivings/index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Recepciónes','url'=>array('invReceivings/admin')),
);
?>

<?php echo BsHtml::pageHeader('Nuevo','Recepción') ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>