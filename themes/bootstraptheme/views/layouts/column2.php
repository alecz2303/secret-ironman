<?php
Yii::app()->clientScript->registerScript('clock', "
$(window).load(function(){
startTime();
autoResizeDiv();
});
$(window).resize(function(){
autoResizeDiv();
});
");
?>
<?php /* @var $this Controller */?>
<?php $this->beginContent('//layouts/main');?>
<div class="row">
    <div class="col-md-10">
        <div id="content">
<?php echo $content;?>
</div><!-- content -->
    </div>
    <div class="col-md-2">
        <div id="sidebar">
            <div id="dt" class="text-center"></div>
            <div id="tm" class="text-center"></div>
        </div>
<?php if (!Yii::app()->user->isGuest):?>
<div id="sidebar">
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
		'title' => '<b>Operaciones</b>',
	));
$this->widget('zii.widgets.CMenu', array(
		'items'       => $this->menu,
		'encodeLabel' => false,
		'htmlOptions' => array('class' => 'operations'),
	));
$this->endWidget();
?>
</div><!-- sidebar -->
<?php endif;?>
</div>
</div>
<?php $this->endContent();?>