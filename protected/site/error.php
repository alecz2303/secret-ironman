<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Error '.$code.'.',
    'htmlOptions'=>array(
        'class'=>'errorPage',
    ),
)); ?>
    <?php echo CHtml::encode($message); ?>
<?php $this->endWidget(); ?>
