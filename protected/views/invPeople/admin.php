<?php
$this->breadcrumbs=array(
	'Inv Peoples'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'Listado de InvPeople','url'=>array('index')),
	array('label'=>'Nuevo InvPeople','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inv-people-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administraci&oacute;n Inv Peoples</h1>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'inv-people-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'first_name',
		'last_name',
		'phone_number',
		'email',
		'address1',
		/*
		'address2',
		'estado',
		'mnpio',
		'col',
		'cp',
		'comments',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
