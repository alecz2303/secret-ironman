 <?php
$this->breadcrumbs = array(
	'Items' => array('index'),
	'Administración',
);

$this->menu = array(
	array('label' => '<i class="glyphicon glyphicon-list"></i> Listado de Item', 'url' => array('index')),
	array('label' => '<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Item', 'url' => array('create')),
);

?>
<?php echo BsHtml::pageHeader('Administración','Items') ?>
<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
<?php $this->widget('bootstrap.widgets.BsGridView', array(
		'id'           => 'inv-item-grid',
		'dataProvider' => $model->search(),
		'filter'       => $model,
		'columns'      => array(
			//'id',
			'name',
			'category',
			array(
				'name'  => 'company_name',
				'value' => '$data->invSuppliers->company_name',
			),
			'description',
			array(
				'name'  => 'cost_price',
				'type'  => 'raw',
				'value' => 'Yii::app()->format->formatNumber($data->cost_price)',
			),
			array(
				'name'  => 'unit_price',
				'type'  => 'raw',
				'value' => 'Yii::app()->format->formatNumber($data->unit_price)',
			),
			'quantity',
			'reorder_level',
			/*
			'deleted',
			 */
			array(
				'class' => 'bootstrap.widgets.BsButtonColumn',
			),
		),
	));?>
	</div>
</div>