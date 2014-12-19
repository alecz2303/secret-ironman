<?php
/* @var $this TblUserController */
/* @var $model TblUser */
?>

<?php
$this->breadcrumbs=array(
	'Tbl Users'=>array('index'),
	'Nuevo',
);

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de TblUser', 'url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración TblUser', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Nuevo','TblUser') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>