<?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'action'      => Yii::app()->createUrl($this->route),
	'method'      => 'get',
	'htmlOptions' => array('class' => 'form form-inline'),
	));?>
	<br />

	<div class="row">
		<?php echo $form->textFieldControlGroup($model, 'eps', array('class' => 'span3', 'maxlength' => 15, 'placeholder' => 'Escritura Publica'));?>
		<?php echo $form->textFieldControlGroup($model, 'lugar', array('class' => 'span3', 'maxlength' => 100, 'placeholder' => 'Lugar'));?>
		<?php echo $form->dropdownListControlGroup($model, 'tipo', array(0=>'Bancos',1=>'Particular',2=>'Solida'),array('empty'=>'--')); ?>
		<?php echo $form->textFieldControlGroup($model, 'sr', array('class' => 'span3', 'maxlength' => 45, 'placeholder' => 'Solicitud de Recursos'));?>
	</div><br />

	<div class="row">
		<?php echo $form->textFieldControlGroup($model, 'clg', array('class' => 'span3', 'maxlength' => 45, 'placeholder' => 'CLG'));?>
		<?php echo $form->textFieldControlGroup($model, 'clg_fecha', array('class' => 'span3', 'placeholder' => 'Fecha CLG'));?>
		<?php echo $form->textFieldControlGroup($model, 'clg_volante', array('class' => 'span3', 'maxlength' => 45, 'placeholder' => 'Volante CLG'));?>
	</div><br />

	<div class="row">
		<?php echo $form->textFieldControlGroup($model, 'sap', array('class' => 'span3', 'maxlength' => 45, 'placeholder' => 'Segundo Aviso Preventivo'));?>
		<?php echo $form->textFieldControlGroup($model, 'sap_fecha', array('class' => 'span3', 'placeholder' => 'Fecha Segundo Aviso Preventivo'));?>
		<?php echo $form->textFieldControlGroup($model, 'sap_volante', array('class' => 'span3', 'maxlength' => 45, 'placeholder' => 'Volante Segundo Aviso Preventivo'));?>
	</div><br />

	<div class="row">
		<?php echo $form->textFieldControlGroup($model, 'itd', array('class' => 'span3', 'placeholder' => 'I.T.D.'));?>
		<?php echo $form->dropdownListControlGroup($model, 'apendice', array(0=>'NO',1=>'SI'),array('empty'=>'--')); ?>
		<?php echo $form->dropdownListControlGroup($model, 'declaranot', array(0=>'NO',1=>'SI'),array('empty'=>'--')); ?>
		<?php echo $form->textFieldControlGroup($model, 'rpp', array('class' => 'span3', 'placeholder' => 'RPP'));?>
	</div><br />

	<div class="row">
		<?php echo $form->textFieldControlGroup($model, 'rpp_volante', array('class' => 'span3', 'maxlength' => 45, 'placeholder' => 'Volante RPP'));?>
		<?php echo $form->dropdownListControlGroup($model, 'nc', array(0=>'NO',1=>'SI'),array('empty'=>'--')); ?>
		<?php echo $form->textFieldControlGroup($model, 'r_rpp', array('class' => 'span3', 'placeholder' => 'Regreso RPP'));?>
		<?php echo $form->dropdownListControlGroup($model, 'terminada', array(0=>'NO',1=>'SI'),array('empty'=>'--')); ?>
	</div><br />
	<div class="row form-actions">
		<?php echo BsHtml::submitButton('Buscar',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
	</div>

	<?php $this->endWidget();?>
