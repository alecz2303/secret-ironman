<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="errorPage">
<?= BsHtml::jumbotron(
        'Error:'.$code.'.', 
        CHtml::encode($message).($code==404 ? '<br /><img src="'.Yii::app()->request->baseUrl.'/img/404.jpg" class="img-responsive" alt="" />':''), 
        array(), 
        true) 
?>
</div>