 <?php
$this->breadcrumbs=array(
	'Recepciónes'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Recepciónes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nueva Recepción','url'=>array('InvReceivingsItems/create')),
);
?>

<?php echo BsHtml::pageHeader('Administración','Recepciónes') ?>


<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'inv-receivings-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'receiving_time',
		array( 
                    'name'=>'company_name_search', 
                    'value'=>'$data->suplier->company_name',
                ),
		'user',
		'comment',
		array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
		),
	),
)); 
