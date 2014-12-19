<?php
/* @var $this TblUserController */
/* @var $model TblUser */
?>

<?php
$this->breadcrumbs=array(
	'Tbl Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualización',
);

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de TblUser', 'url'=>array('index')),
    array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo TblUser', 'url'=>array('create')),
    array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle TblUser', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración TblUser', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Actualización','TblUser '.$model->id) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>