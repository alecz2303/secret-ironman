<?php
/* @var $this SccExpedientesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Scc Expedientes',
);

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración SccExpedientes', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Scc Expedientes') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>