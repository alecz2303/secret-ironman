 <?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Proveedores','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Proveedor','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inv-suppliers-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo BsHtml::pageHeader('Administración','Proveedores') ?>
<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'inv-suppliers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'people_id',
		'company_name',
                array( 
                    'name'=>'first_name', 
                    'value'=>'$data->people->first_name',
                ),
                array( 
                    'name'=>'last_name', 
                    'value'=>'$data->people->last_name',
                ),
                array( 
                    'name'=>'phone_number', 
                    'value'=>'$data->people->phone_number',
                ),
                array( 
                    'name'=>'email', 
                    'type'=>'raw',
                    'value'=>'CHtml::mailto($data->people->email)'
                ),
                array( 
                    'name'=>'comments', 
                    'value'=>'$data->people->comments',
                ),
		//'deleted',
		array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
		),
	),
)); ?>
    </div>
</div>