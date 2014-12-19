<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

        </h3>
    </div>
    <div class="panel-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('sale_time')); ?>:</b>
	<?php echo CHtml::encode($data->sale_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invPeople.first_name')); ?>:</b>
	<?php echo CHtml::encode($data->invPeople->first_name.' '.$data->invPeople->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user')); ?>:</b>
	<?php echo CHtml::encode($data->user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

    </div>
</div>