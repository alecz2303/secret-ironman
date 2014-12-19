 <?php
 $this->breadcrumbs=array(
 	'Estatus Expedientes Protocolo Especial',
 	);

 $this->menu=array(
 	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Estatus Exp P.E.','url'=>array('create')),
 	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Estatus Exp P.E.','url'=>array('admin')),
 	);
 	?>

 	<?php echo BsHtml::pageHeader('Estatus Expedientes Protocolo Especial') ?>
 	<?php $this->widget('bootstrap.widgets.BsListView',array(
 		'dataProvider'=>$dataProvider,
 		'itemView'=>'_view',
 		)); ?>
