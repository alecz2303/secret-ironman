<?php
$this->breadcrumbs=array(
	'Testimonios Infonavit'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Testimonios Infonavit','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio Infonavit','url'=>array('create')),
);
?>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo BsHtml::pageHeader('Administración','Testimonio Infonavit') ?></h3>
    </div>
    <div class="panel-body">
<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'testimonio-infonavit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'rowCssClassExpression'=>'$data->color',
	'columns'=>array(
		//'id',
		'escritura',
		'anno',
		'nombre',
		'fecha_entrega',
		'recibe',
		array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
		),
	),
)); ?>
	</div>
</div>
