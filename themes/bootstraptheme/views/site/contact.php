<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle   = Yii::app()->name.' - Contact Us';
$this->breadcrumbs = array(
	'Contact',
);
?>
<h1>Contáctanos</h1>

<?php //if(Yii::app()->user->hasFlash('contact')): ?>

<?php //$this->widget('bootstrap.widgets.BsAlert', array(
//'alerts'=>array('contact'),
//)); ?>
<?php if (($msgs = Yii::app()->user->getFlashes()) !== null):?>
    <?php foreach ($msgs as $type => $message):?>
    <?php
echo BsHtml::alert($type, $message);
?>
<?php endforeach;?>
<?php endif;?>
<p>
Si tienes alguna consulta de negocios o alguna otra pregunta, por favor llena el siguiente formulario de contacto. Gracias.
</p>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
		'id'                     => 'contact-form',
		'enableClientValidation' => true,
		'clientOptions'          => array(
			'validateOnSubmit' => true,
		),
	));?>
<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model);?>
<div class="row">
<?php echo $form->textFieldControlGroup($model, 'name', array(
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_USER),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)

	));?>
</div>
<div class="row">
<?php echo $form->emailFieldControlGroup($model, 'email', array(
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_ENVELOPE),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)

	));?>
</div>
<div class="row">
<?php echo $form->textFieldControlGroup($model, 'subject', array(
		'size'           => 60,
		'maxlength'      => 128,
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_PENCIL),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)
	));?>
</div>
<div class="row">
<?php echo $form->textAreaControlGroup($model, 'body', array(
		'rows'           => 6,
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_COMMENT),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)
	));?>
</div>
<?php if (CCaptcha::checkRequirements()):?>
                <?php $this->widget('CCaptcha');?>
<div class="row">
<?php echo $form->textFieldControlGroup($model, 'verifyCode', array(
		'hint'           => 'Por favor teclee las letras como se muestran en la imagen anterior.<br/>Las letras NO son sensbles a mayusculas-minusculas.',
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_QRCODE),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)
	));?>
</div>
<?php endif;?>
<div class="form-actions">
<?php
echo BsHtml::submitButton('Enviar', array(
		'color' => BsHtml::BUTTON_COLOR_PRIMARY
	));
?>
</div>

<?php $this->endWidget();?>

</div><!-- form -->