<?php
$this->breadcrumbs=array(
	'Recepciónes'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'Listado de Recepciónes','url'=>array('invReceivings/index')),
	array('label'=>'Nueva Recepción','url'=>array('invReceivings/create')),
);

?>

<h1>Administraci&oacute;n Recepciónes</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'inv-receivings-items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'receivings_id',
                'receivings.suplier.company_name',
		array( 
                    'name'=>'name', 
                    'value'=>'$data->item->name',
                ),
		'description',
		'serialnumber',
		'qty_purchased',
                array( 
                    'name'=>'item_cost_price', 
                    'type'=>'raw',
                    'value'=>'Yii::app()->format->formatNumber($data->item_cost_price)'
                ),
                array( 
                    'name'=>'item_unit_price', 
                    'type'=>'raw',
                    'value'=>'Yii::app()->format->formatNumber($data->item_unit_price)'
                ),
		'discount_percent',
                array( 
                    'name'=>'user', 
                    'value'=>'$data->receivings->user',
                ),
                array( 
                    'name'=>'receiving_time', 
                    'value'=>'$data->receivings->receiving_time',
                ),
                array( 
                    'name'=>'comment', 
                    'value'=>'$data->receivings->comment',
                ),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
