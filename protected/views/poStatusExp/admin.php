<?php
$this->breadcrumbs = array(
	'Po Status Exps' => array('index'),
	'Administración',
	);

$this->menu = array(
	array('label' => '<i class="glyphicon glyphicon-list"></i> Listado de PoStatusExp', 'url' => array('index')),
	array('label' => '<i class="glyphicon glyphicon-plus-sign"></i> Nuevo PoStatusExp', 'url' => array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('po-status-exp-grid', {
		data: $(this).serialize()
	});
return false;
});
");
?>
<?php echo BsHtml::pageHeader('Administración','PO Estatus Expedientes') ?>
<?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button btn btn-primary'));?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array('model' => $model,));?>
</div><!-- search-form -->
<hr>
<?php $this->widget('bootstrap.widgets.BsGridView', array(
	'id'           => 'po-status-exp-grid',
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'columns'      => array(
		'eps',
		array(
			'name'  => 'expediente_DBA_search',
			'value' => '$data->ep0->expediente_DBA',
			),
		array(
			'name'  => 'libro_search',
			'value' => '$data->ep0->libro',
			),
		array(
			'name'  => 'folio_ini_search',
			'value' => '$data->ep0->folio_ini',
			),
		array(
			'name'  => 'folio_fin_search',
			'value' => '$data->ep0->folio_fin',
			),
		array(
			'name'  => 'fecha_search',
			'value' => '$data->ep0->fecha',
			),
		array(
			'name'  => 'enajenante_search',
			'value' => '$data->ep0->enajenante',
			),
		array(
			'name'  => 'adquirente_search',
			'value' => '$data->ep0->adquirente',
			),
		array(
			'name'  => 'acto_search',
			'value' => '$data->ep0->acto',
			),
		'lugar',
		array(
			'class' => 'bootstrap.widgets.BsButtonColumn',
			),
		),
		));?>
