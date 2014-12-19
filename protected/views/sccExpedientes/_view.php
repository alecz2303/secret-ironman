<?php
/* @var $this SccExpedientesController */
/* @var $data SccExpedientes */
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

        </h3>
    </div>
    <div class="panel-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Expediente')); ?>:</b>
	<?php echo CHtml::encode($data->Expediente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Operacion')); ?>:</b>
	<?php echo CHtml::encode($data->Operacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Instrumento')); ?>:</b>
	<?php echo CHtml::encode($data->Instrumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Abogado')); ?>:</b>
	<?php echo CHtml::encode($data->Abogado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo); ?>
	<br />

    </div>
</div>