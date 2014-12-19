<?php
$this->breadcrumbs=array(
	'Recepciónes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Recepciónes','url'=>array('invReceivings/index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nueva Recepción','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Recepciónes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Recepciónes','url'=>array('invReceivings/admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Recepción '.$model->id) ?>
<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		//'id',
		//'receivings_id',
		'item.name',
		'description',
		'serialnumber',
		'qty_purchased',
                array( 
                    'name'=>'item_cost_price', 
                    'type'=>'raw',
                    'value'=>Yii::app()->format->formatNumber($model->item_cost_price),
                ),
                array( 
                    'name'=>'item_unit_price', 
                    'type'=>'raw',
                    'value'=>Yii::app()->format->formatNumber($model->item_unit_price),
                ),
		'discount_percent',
	),
)); ?>
