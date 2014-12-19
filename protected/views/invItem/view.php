 <?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Item','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Item','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización Item','url'=>array('update','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Item','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Item '.$model->id) ?>
<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		//'id',
		'name',
		'category',
		'invSuppliers.company_name',
		'description',
                array( 
                    'name'=>'cost_price', 
                    'type'=>'raw',
                    'value'=>Yii::app()->format->formatNumber($model->cost_price),
                ),
                array( 
                    'name'=>'unit_price', 
                    'type'=>'raw',
                    'value'=>Yii::app()->format->formatNumber($model->unit_price),
                ),
		'quantity',
		'reorder_level',
		//'deleted',
	),
)); ?>
