<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?=BsHtml::jumbotron('Bienvenido a ', '<h2>'.CHtml::encode(Yii::app()->name).'</h2>', array(), true)?>

<div align="center">
    <img src="<?php echo Yii::app()->request->baseUrl;?>/img/n39logocolorrojo.png" width="150" height="200" class="img-responsive" alt="" />
</div>


<?php
$browser  = Yii::app()->browser->getBrowser();
$platform = Yii::app()->browser->getPlatform();

if ($browser == 'Internet Explorer' || $browser == 'Pocket Internet Explorer') {
	$this->redirect(array('/site/page', 'view' => 'navegador'));
}
?>