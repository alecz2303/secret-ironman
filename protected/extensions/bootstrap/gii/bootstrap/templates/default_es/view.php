<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>

<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de <?php echo $this->modelClass; ?>', 'url'=>array('index')),
    array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo <?php echo $this->modelClass; ?>', 'url'=>array('create')),
    array('label'=>'<i class="glyphicon glyphicon-edit"></i> Actualización <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
    array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'¿Esta seguro que quiere borrar este item?')),
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<?php echo "<?php echo BsHtml::pageHeader('Detalle','$this->modelClass '.\$model->{$this->tableSchema->primaryKey}) ?>\n"; ?>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
    echo "\t\t'" . $column->name . "',\n";
}
?>
	),
)); ?>