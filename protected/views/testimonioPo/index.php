  <?php
$this->breadcrumbs=array(
	'Testimonio Protocolo Ordinario',
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Testimonio P.O.','url'=>array('create')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Testimonios P.O.','url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Testimonios Protocolo Ordinario') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
