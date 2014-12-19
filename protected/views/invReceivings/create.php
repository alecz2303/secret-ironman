<?php
$this->breadcrumbs=array(
	'Inv Receivings'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listado InvReceivings','url'=>array('index')),
	array('label'=>'Administración InvReceivings','url'=>array('admin')),
);
?>

<h1>Nuevo InvReceivings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>