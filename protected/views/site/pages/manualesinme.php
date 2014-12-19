<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Manuales INME';
$this->breadcrumbs=array(
	'Manuales INME',
);
?>
<h1>Manuales INME</h1>
<div id="pageWrapper" class="container">
    <div id="leftColumn">
        <div class="span4">
            <?php
                echo CHtml::link(
                        '<i class="fa fa-book fa-4x pull-left"></i> ENVIO INFORMACION<br>DISEÑO INSTRUCCIONAL',
                        Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Envio_informacion_diseno_instruccional')) ,
                        array('class'=>'btnPrint btn btn-danger','target'=>'_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="span4">
            <?php
                echo CHtml::link(
                        '<i class="fa fa-book fa-4x pull-left"></i> ASISTENCIA MOODLE',
                        Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'manual_asistencia')) ,
                        array('class'=>'btnPrint btn btn-danger','target'=>'_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="span4">
            <?php
                echo CHtml::link(
                        '<i class="fa fa-book fa-4x pull-left"></i> TUTOR MOODLE',
                        Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'manual_del_tutor')) ,
                        array('class'=>'btnPrint btn btn-danger','target'=>'_blank'));
            ?>
        </div>
    </div> 
    <div id="middleColumn">
        <div class="span4">
            <?php
                echo CHtml::link(
                        '<i class="fa fa-book fa-4x pull-left"></i> PROMOCION EVENTO<br>FACEBOOK',
                        Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'manual_promocion_evento_fb')) ,
                        array('class'=>'btnPrint btn btn-danger','target'=>'_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="span4">
            <?php
                echo CHtml::link(
                        '<i class="fa fa-book fa-4x pull-left"></i> USO AULA VIRTUAL<br>(ALUMNO)',
                        Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'uso_aula_virtual_alumno')) ,
                        array('class'=>'btnPrint btn btn-danger','target'=>'_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="span4">
            <?php
                echo CHtml::link(
                        '<i class="fa fa-book fa-4x pull-left"></i> USO AULA VIRTUAL<br>(ENTRAR AL CURSO)',
                        Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'uso_aula_virtual_entrar_curso')) ,
                        array('class'=>'btnPrint btn btn-danger','target'=>'_blank'));
            ?>
        </div>
    </div>
</div>