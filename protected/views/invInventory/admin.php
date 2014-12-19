<?php
$this->breadcrumbs=array(
	'Inv Inventories'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'Listado de InvInventory','url'=>array('index')),
	array('label'=>'Nuevo InvInventory','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inv-inventory-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administraci&oacute;n Inv Inventories</h1>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'inv-inventory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'item_id',
		'user',
		'date',
		'comment',
		'inventory',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
