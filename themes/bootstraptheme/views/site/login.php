<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle   = Yii::app()->name.' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>
<fieldset>

        <legend>Login</legend>

<p>Por favor llene el siguiente formulario con sus datos:</p>

<?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
		'id'                     => 'login-form',
		'enableClientValidation' => true,
		'clientOptions'          => array(
			'validateOnSubmit' => true,
		),
	));?>
<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model);?>
<div class="row">
<?php
echo $form->textFieldControlGroup($model, 'username', array(
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_USER),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)
	)
);
?>
</div>

        <div class="row">
<?php echo $form->passwordFieldControlGroup($model, 'password', array(
		'prepend'        => BsHtml::icon(BsHtml::GLYPHICON_LOCK),
		'controlOptions' => array(
			'class' => 'col-lg-12',
		),
		'groupOptions' => array(
			'class' => 'col-lg-6',
		)
	)
);
?>
</div>


<?php echo $form->checkBoxControlGroup($model, 'rememberMe');?>

<?php
echo BsHtml::formActions(array(
		BsHtml::submitButton('Login', array(
				'color' => BsHtml::BUTTON_COLOR_PRIMARY,
				'icon'  => BsHtml::GLYPHICON_OFF,
			))
	));
?>
</fieldset>

<?php $this->endWidget();?>