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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Actualización',
);\n";
?>

$this->menu=array(
    array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado de <?php echo $this->modelClass; ?>', 'url'=>array('index')),
    array('label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Nuevo <?php echo $this->modelClass; ?>', 'url'=>array('create')),
    array('label'=>'<i class="glyphicon glyphicon-list-alt"></i> Detalle <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
    array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<?php echo "<?php echo BsHtml::pageHeader('Actualización','$this->modelClass '.\$model->{$this->tableSchema->primaryKey}) ?>\n"; ?>
<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>