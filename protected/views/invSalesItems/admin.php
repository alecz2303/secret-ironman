<?php
$this->breadcrumbs=array(
	'Inv Sales Items'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'Listado de InvSalesItems','url'=>array('index')),
	array('label'=>'Nuevo InvSalesItems','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inv-sales-items-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administraci&oacute;n Inv Sales Items</h1>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'inv-sales-items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sales_id',
		'item_id',
		'description',
		'serialnumber',
		'qty_purchased',
		/*
		'item_cost_price',
		'item_unit_price',
		'discount_percent',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
