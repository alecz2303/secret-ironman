<?php
/* @var $this SccExpedientesController */
/* @var $model SccExpedientes */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id'); ?>
    <?php echo $form->textFieldControlGroup($model,'Fecha',array('maxlength'=>100)); ?>
    <?php echo $form->textFieldControlGroup($model,'Expediente'); ?>
    <?php echo $form->textFieldControlGroup($model,'Operacion',array('maxlength'=>104)); ?>
    <?php echo $form->textFieldControlGroup($model,'Instrumento',array('maxlength'=>22)); ?>
    <?php echo $form->textFieldControlGroup($model,'Abogado',array('maxlength'=>28)); ?>
    <?php echo $form->textFieldControlGroup($model,'Tipo',array('maxlength'=>2)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Buscar',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
