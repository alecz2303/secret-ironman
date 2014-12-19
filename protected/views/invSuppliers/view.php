 <?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Proveedores','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Proveedor','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización Proveedor','url'=>array('update','id'=>$model->id)),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Proveedor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Proveedores','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Detalle','Proveedores '.$model->id) ?>
<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		//'id',
		//'people_id',
		'company_name',
                'people.first_name',
                'people.last_name',
                'people.phone_number',
                array( 
                    'name'=>'email', 
                    'type'=>'raw',
                    'value'=>CHtml::mailto(CHtml::encode($model->people->email)),
                ),
                'people.address1',
                'people.address2',
                'people.codigos.d_estado',
                'people.codigos.D_mnpio',
                'people.codigos.d_asenta',
                'people.codigos.d_codigo',
                'people.comments',
		//'deleted',
	),
)); ?>
