 <?php
 $this->breadcrumbs=array(
 	'Po Status Exps',
 	);

 $this->menu=array(
 	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo PoStatusExp','url'=>array('create')),
 	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración PoStatusExp','url'=>array('admin')),
 	);
 	?>

 	<?php echo BsHtml::pageHeader('Estatus Expedientes Protocolo Ordinario') ?>
 	<?php $this->widget('bootstrap.widgets.BsListView',array(
 		'dataProvider'=>$dataProvider,
 		'itemView'=>'_view',
 		)); ?>
