<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2 class="alert alert-danger">Error <?php echo $code; ?></h2>

<div class="alert-danger error">
<?php echo CHtml::encode($message); ?>
</div>