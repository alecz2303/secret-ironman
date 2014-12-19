<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">

	<b><?php echo CHtml::encode($data->getAttributeLabel('item.name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->item->name),array('view','id'=>$data->id)); ?>
	<br />

        </h3>
    </div>
    <div class="panel-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serialnumber')); ?>:</b>
	<?php echo CHtml::encode($data->serialnumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qty_purchased')); ?>:</b>
	<?php echo CHtml::encode($data->qty_purchased); ?>
	<br />
        <?php setlocale(LC_ALL, 'es_MX');
?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('item_cost_price')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->format->formatNumber($data->item_cost_price)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('item_unit_price')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->format->formatNumber($data->item_unit_price)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_percent')); ?>:</b>
	<?php echo CHtml::encode($data->discount_percent); ?>
	<br />
	
        <b><?php echo CHtml::encode($data->getAttributeLabel('receivings.receiving_time')); ?>:</b>
	<?php echo CHtml::encode($data->receivings->receiving_time); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('receivings.user')); ?>:</b>
	<?php echo CHtml::encode($data->receivings->user); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('receivings.comment')); ?>:</b>
	<?php echo CHtml::encode($data->receivings->comment); ?>
	<br />

    </div>
</div>