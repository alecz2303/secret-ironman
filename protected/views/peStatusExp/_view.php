<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">

			<b><?php echo CHtml::encode($data->getAttributeLabel('id'));?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id));?>
			<br />

		</h3>
	</div>
	<div class="panel-body">
		<b><?php echo CHtml::encode($data->getAttributeLabel('eps'));?>:</b>
		<?php echo CHtml::encode($data->eps);?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('lugar'));?>:</b>
		<?php echo CHtml::encode($data->lugar);?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('sr'));?>:</b>
		<?php echo CHtml::encode($data->sr);?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('clg'));?>:</b>
		<?php echo CHtml::encode($data->clg);?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('clg_fecha'));?>:</b>
		<?php echo CHtml::encode($data->clg_fecha);?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('clg_volante'));?>:</b>
		<?php echo CHtml::encode($data->clg_volante);?>
		<br />

<?php /*
<b><?php echo CHtml::encode($data->getAttributeLabel('sap')); ?>:</b>
<?php echo CHtml::encode($data->sap); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('sap_fecha')); ?>:</b>
<?php echo CHtml::encode($data->sap_fecha); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('sap_volante')); ?>:</b>
<?php echo CHtml::encode($data->sap_volante); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('itd')); ?>:</b>
<?php echo CHtml::encode($data->itd); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('notas')); ?>:</b>
<?php echo CHtml::encode($data->notas); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('apendice')); ?>:</b>
<?php echo CHtml::encode($data->apendice); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('declaranot')); ?>:</b>
<?php echo CHtml::encode($data->declaranot); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('rpp')); ?>:</b>
<?php echo CHtml::encode($data->rpp); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('rpp_volante')); ?>:</b>
<?php echo CHtml::encode($data->rpp_volante); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('nc')); ?>:</b>
<?php echo CHtml::encode($data->nc); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('r_rpp')); ?>:</b>
<?php echo CHtml::encode($data->r_rpp); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($data->status); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('terminada')); ?>:</b>
<?php echo CHtml::encode($data->terminada); ?>
<br />

 */?>
</div>
</div>