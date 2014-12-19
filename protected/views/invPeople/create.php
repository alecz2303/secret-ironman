<?php
$this->breadcrumbs=array(
	'Inv Peoples'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listado InvPeople','url'=>array('index')),
	array('label'=>'Administración InvPeople','url'=>array('admin')),
);
?>

<h1>Nuevo InvPeople</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>