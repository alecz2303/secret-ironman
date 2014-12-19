 <?php
$this->breadcrumbs=array(
	'Testimonio Protocolo Ordinaio'=>array('index'),
	'Administración',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de Testimonios P.O.','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio P.O.','url'=>array('create')),
);


?>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo BsHtml::pageHeader('Administración','Testimonio Protocolo Ordinario') ?></h3>
    </div>
    <div class="panel-body">

<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'testimonio-po-grid',
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