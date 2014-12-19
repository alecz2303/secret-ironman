<?php
$this->breadcrumbs=array(
	'Inv Sales Payments'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'Listado de InvSalesPayments','url'=>array('index')),
	array('label'=>'Nuevo InvSalesPayments','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inv-sales-payments-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administraci&oacute;n Inv Sales Payments</h1>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'inv-sales-payments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sales_id',
		'payment_type',
		'payment_amount',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
