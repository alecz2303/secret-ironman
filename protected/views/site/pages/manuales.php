<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle   = Yii::app()->name.' - Manuales Notaria';
$this->breadcrumbs = array(
	'Manuales Notaria',
);
?>
<h1>Manuales Notaria</h1>
<div id="pageWrapper" class="container">
    <div id="leftColumn">
        <div class="col-md-12">
            <div class="btn-group">
                <?php
                echo CHtml::link(
                	'<i class="fa fa-book fa-4x pull-left"></i> ADJUNTAR IMAGENES<br>EN DBA SYSTEM',
                	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Manual_para_adjuntar_imagenes_en_DBA_System')),
                	array('class' => 'btn btn-danger', 'target' => '_blank'));
                ?>
            </div>

            </div>
            <br />
            <br />
            <br />
            <br />
            <div class="col-md-12">
                <?php
                echo CHtml::link(
                    '<i class="fa fa-book fa-4x pull-left"></i> USO DE PLANTILLAS<br>DBA SYSTEM',
                    Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Uso_de_plantillas_en_DBA')),
                    array('class' => 'btn btn-danger', 'target' => '_blank'));
                ?>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <?php
                echo CHtml::link(
                    '<i class="fa fa-book fa-4x pull-left"></i> Uso Calculadora ISR<br>DBA System',
                    Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'CalculadoraISR    ')),
                    array('class' => 'btn btn-danger', 'target' => '_blank'));
                ?>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <?php
                echo CHtml::link(
                    '<i class="fa fa-book fa-4x pull-left"></i> CONMUTADOR<br>Y LINEAS',
                    Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'manual_conmutador')),
                    array('class' => 'btn btn-danger', 'target' => '_blank'));
                ?>
            </div>
    </div>
    <div id="middleColumn">
        <div class="col-md-12">
            <?php
            echo CHtml::link(
            	'<i class="fa fa-book fa-4x pull-left"></i> TU EMPRESA',
            	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Manual_tu_empresa')),
            	array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-12">
            <?php
            echo CHtml::link(
            	'<i class="fa fa-book fa-4x pull-left"></i> AVISO DE USO',
            	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Aviso_de_Uso')),
            	array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-12">
            <?php
            echo CHtml::link(
            	'<i class="fa fa-book fa-4x pull-left"></i> AVISO DE TEST.<br>CHIAPAS',
            	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'AVISOS_DE_TESTAMENTO')),
            	array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
        <br>
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <?php
                echo CHtml::link(
                    '<i class="fa fa-book fa-4x pull-left"></i> CONFIGURACION WIN 7<br>FEDANET-SIGER',
                    Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Configurar_Fedanet_en_Windows_7')),
                    array('class' => 'btn btn-danger', 'target' => '_blank'));
                ?>
            </div>
    </div>
    <div id="rightColumn">
        <div class="col-md-12">
            <?php
            echo CHtml::link(
            	'<i class="fa fa-book fa-4x pull-left"></i> ALTA RFC VIA REMOTA',
            	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Manual_Alta_de_RFC_Via_Remota')),
            	array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-12">
            <?php
            echo CHtml::link(
            	'<i class="fa fa-book fa-4x pull-left"></i> INTEGRACION EXPEDIENTES <br>CREDITO INFONAVIT',
            	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'ManualIntegracionExpedientesCreditoInfonavit')),
            	array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-12">
            <?php
            echo CHtml::link(
            	'<i class="fa fa-book fa-4x pull-left"></i> FEDANET-SIGER',
            	Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'manual_fedanet')),
            	array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-12">
            <?php
            echo CHtml::link(
                '<i class="fa fa-book fa-4x pull-left"></i> CONFIGURACION WIN XP <BR>FEDANET-SIGER',
                Yii::app()->createUrl('/upload/viewPdf', array('filename' => 'Configurar_Fed@net_en_Windows_XP')),
                array('class' => 'btn btn-danger', 'target' => '_blank'));
            ?>
        </div>
    </div>

</div>