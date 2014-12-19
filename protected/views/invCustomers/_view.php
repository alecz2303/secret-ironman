<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->people->first_name.' '.$data->people->last_name),array('view','id'=>$data->id)); ?>
	<br />

        </h3>
    </div>
    <div class="panel-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('people.phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->people->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('people.email')); ?>:</b>
	<?php echo CHtml::mailto(CHtml::encode($data->people->email)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('people.address1')); ?>:</b>
	<?php echo CHtml::encode($data->people->address1); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('people.address2')); ?>:</b>
	<?php echo CHtml::encode($data->people->address2); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('people.codigos.d_estado')); ?>:</b>
	<?php echo CHtml::encode($data->people->codigos->d_estado); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('people.codigos.D_mnpio')); ?>:</b>
	<?php echo CHtml::encode($data->people->codigos->D_mnpio); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('people.codigos.d_asenta')); ?>:</b>
	<?php echo CHtml::encode($data->people->codigos->d_asenta); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('people.codigos.d_codigo')); ?>:</b>
	<?php echo CHtml::encode($data->people->codigos->d_codigo); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('people.comments')); ?>:</b>
	<?php echo CHtml::encode($data->people->comments); ?>
	<br />
    </div>
</div>