<?php
$this->breadcrumbs=array(
	'Recepciónes',
);

$this->menu=array(
	array('label'=>'Nueva Recepción','url'=>array('invReceivings/create')),
	array('label'=>'Administración Recepciónes','url'=>array('invReceivings/admin')),
);
?>

<h1>Recepciónes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
