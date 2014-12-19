 <?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Clientes','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Cliente','url'=>array('create')),
);

?>

<?php echo BsHtml::pageHeader('Administración','Clientes') ?>
<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'inv-customers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'people_id',
		//'deleted',
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
                /*array( 
                    'name'=>'address1', 
                    'value'=>'$data->people->address1',
                ),
                array( 
                    'name'=>'address2', 
                    'value'=>'$data->people->address2',
                ),
                'people.codigos.d_estado',
                'people.codigos.D_mnpio',
                'people.codigos.d_asenta',
                array( 
                    'name'=>'cp', 
                    'value'=>'$data->people->cp',
                ),*/
                array( 
                    'name'=>'comments', 
                    'value'=>'$data->people->comments',
                ),
		array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
		),
	),
)); ?>
    </div>
</div>