<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Acerca de Nosotros';
$this->breadcrumbs=array(
	'Acerca de Nosotros',
);
?>
<div class="row">
    <div class="span6 about">
        <h1 class="text-center">Acerca de Nosotros</h1>
        <p class="text-justify">
            Los Sistemas de Información (SI) y las Tecnologías de Información (TI) han cambiado la forma en que operan las organizaciones actuales. A través de su uso se logran importantes mejoras, pues automatizan los procesos operativos, suministran una plataforma de información necesaria para la toma de decisiones y, lo más importante, su implantación logra ventajas competitivas o reducir la ventaja de los rivales.
            Las Tecnologías de la Información han sido conceptualizadas como la integración y convergencia de la computación, las telecomunicaciones y la técnica para el procesamiento de datos, donde sus principales componentes son: el factor humano, los contenidos de la información, el equipamiento, la infraestructura, el software y los mecanismos de intercambio de información, los elementos de política y regulaciones, además de los recursos financieros.
        </p>
        <p class="sign text-center">Creamos lo que imaginas...</p>
    </div>
    <div class="span5">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_alex.png" class="img-responsive" alt="" />
    </div>
</div>
