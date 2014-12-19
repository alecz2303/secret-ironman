<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

        </h3>
    </div>
    <div class="panel-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('ep')); ?>:</b>
	<?php echo CHtml::encode($data->ep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio_ini')); ?>:</b>
	<?php echo CHtml::encode($data->folio_ini); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio_fin')); ?>:</b>
	<?php echo CHtml::encode($data->folio_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acto')); ?>:</b>
	<?php echo CHtml::encode($data->acto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enajenante')); ?>:</b>
	<?php echo CHtml::encode($data->enajenante); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('adquirente')); ?>:</b>
	<?php echo CHtml::encode($data->adquirente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsable')); ?>:</b>
	<?php echo CHtml::encode($data->responsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expediente_DBA')); ?>:</b>
	<?php echo CHtml::encode($data->expediente_DBA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_Registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_Registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canc')); ?>:</b>
	<?php echo CHtml::encode($data->canc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('libro')); ?>:</b>
	<?php echo CHtml::encode($data->libro); ?>
	<br />

	*/ ?>
    </div>
</div>