 <?php
$this->breadcrumbs = array(
	'Salidas de Inventario' => array('index'),
	'Administración',
);

$this->menu = array(
	array('label' => '<i class="glyphicon glyphicon-list"></i> Listado de Salidas', 'url' => array('index')),
	array('label' => '<i class="glyphicon glyphicon-plus-sign"></i> Nueva Salida', 'url' => array('invSalesItems/create')),
);

?>
<?php
$this->widget('ext.mPrint.mPrint', array(
		'element' => '#imprimir',
		/*'element' => '#page', *///the element to be printed.
		'exceptions' => array(//the element/s which will be ignored
			'.summary',
			'.search-form',
		),
		'title'      => 'Salida de Inventario',
		'alt'        => 'Imprimir', //text which will appear if image can't be loaded
		'id'         => 'print-div',
		'publishCss' => true,
		//'visible' => Yii::app()->user->checkAccess('print'),
		//'debug' => true,
	)
);
?>
<div id="imprimir">
<?php echo BsHtml::pageHeader('Administración','Salida de Inventario') ?>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
		'id'           => 'inv-sales-grid',
		'dataProvider' => $model->search(),
		'filter'       => $model,
		'columns'      => array(
			'id',
			'sale_time',
			array(
				'name'  => 'first_name_search',
				'value' => '$data->invPeople->first_name',
			),
			array(
				'name'  => 'last_name_search',
				'value' => '$data->invPeople->last_name',
			),
			'user',
			'comment',
			array(
				'class' => 'bootstrap.widgets.BsButtonColumn',
			),
		),
	));?>
</div>