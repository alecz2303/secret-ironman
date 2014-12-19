<?php
$this->breadcrumbs=array(
	'Protocolo Ordinario Folios Control Expedientes'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Expedientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Expediente','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('po-folios-control-expediente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo BsHtml::pageHeader('Administración','Folios Control Expedientes') ?>
<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">

<?php $classes = 'label label-success';?>
<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'po-folios-control-expediente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'rowCssClassExpression'=>'$data->color',
	'columns'=>array(
		//'id',
        'canc',
		'ep',
        'libro',
		'folio_ini',
		'folio_fin',
		'fecha',
		'acto',
		'enajenante',
		'adquirente',
		'responsable',
		'expediente_DBA',
		'fecha_Registro',
		array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
		),
	),
)); ?>
	</div>
</div>
