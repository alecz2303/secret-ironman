<?php
/* @var $this TblUserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Tbl Users',
);

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo TblUser', 'url'=>array('create')),
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración TblUser', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Tbl Users') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>