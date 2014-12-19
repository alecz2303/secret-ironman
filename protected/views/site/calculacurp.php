<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/alecz/js/calculadora.js');
?>

<?php
$this->pageTitle=Yii::app()->name . ' - Calculadora RFC';
$this->breadcrumbs=array(
	'Calculadora RFC',
);

?>

<?php echo BsHtml::pageHeader('Calculadora','CURP y RFC') ?>

<?php if(isset($_POST['CalculacurpForm'])): ?>

    <?php
    echo BsHtml::well('<h1>El RFC es: ' . $_POST['CalculacurpForm']['rfc'].'</h1>', array(
        'size' => BsHtml::WELL_SIZE_LARGE
    ));
    ?>
    <?php
    echo BsHtml::well('<h1>El CURP es: ' . $_POST['CalculacurpForm']['curp'].'</h1>', array(
        'size' => BsHtml::WELL_SIZE_LARGE
    ));
    ?>
    <?php
    echo CHtml::link(
            'Generar Nuevo RFC y CURP',
            array('site/calculacurp'),
            array('class'=>'btn btn-default')
            ); 

    ?>

<?php else: ?>

<p>
Escriba en el formulario los parametros de busqueda.
</p>

<div class="search-form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'calcularfc-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); 
?>

<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php echo $form->textFieldControlGroup($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

        <?php echo $form->textFieldControlGroup($model,'ap_paterno',array('class'=>'span5','maxlength'=>50)); ?>

        <?php echo $form->textFieldControlGroup($model,'ap_materno',array('class'=>'span5','maxlength'=>50)); ?>

        <?php echo $form->dropDownListControlGroup($model,'sexo',array('H'=>'Hombre','M'=>'Mujer'),array('empty'=>'-- Seleccione una Opción --','class'=>'span5')); ?>

        <div class="form-group">
        <?php echo $form->labelEx($model,'fec_nac',array('class'=>'control-label'));?>
        <?php 
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'attribute'=>'fec_nac',
                'model'=>$model,
                'language'=>'es',
                'htmlOptions'=>array('class'=>'form-control'),
                'options'=>array(
                    'dateFormat'=>'ymmdd',
                    'showButtonPanel'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'-100',
                    
                ),
            ));
        ?>
        <?php echo $form->error($model,'fec_nac'); ?>
        </div>

        <?php echo $form->dropDownListControlGroup(
                $model,
                'estado',
                array(
                    'AS'=>'AGUASCALIENTES',
                    'BC'=>'BAJA CALIFORNIA', 
                    'BS'=>'BAJA CALIFORNIA SUR', 
                    'CC'=>'CAMPECHE', 
                    'CL'=>'COAHUILA', 
                    'CM'=>'COLIMA', 
                    'CS'=>'CHIAPAS', 
                    'CH'=>'CHIHUHUA', 
                    'DF'=>'DISTRITO FEDERAL', 
                    'DG'=>'DURANGO', 
                    'GT'=>'GUANAJUATO', 
                    'GR'=>'GUERRERO', 
                    'HG'=>'HIDALGO', 
                    'JC'=>'JALISCO', 
                    'MC'=>'MEXICO', 
                    'MN'=>'MICHOACAN', 
                    'MS'=>'MORELOS',
                    'NT'=>'NAYARIT',
                    'NL'=>'NUEVO LEON',
                    'OC'=>'OAXACA',
                    'PL'=>'PUEBLA',
                    'QT'=>'QUERETARO',
                    'QR'=>'QUINTANA ROO',
                    'SP'=>'SAN LUIS POTOSI',
                    'SL'=>'SINALOA',
                    'SR'=>'SONORA',
                    'TC'=>'TABASCO',
                    'TS'=>'TAMAULIPAS',
                    'TL'=>'TLAXCALA',
                    'VZ'=>'VERACRUZ',
                    'YN'=>'YUCATAN',
                    'ZS'=>'ZACATECAS',
                    'NE'=>'NACIDO EN EL EXTRANJERO',
                ),
                array(
                    'empty'=>'-- Seleccione una Opción --',
                    'class'=>'span5'
                    )
                ); 
        ?>

        <div class="form-actions">
        <?php 
            echo BsHtml::submitButton(
                'Generar CURP y RFC', 
                array(
                    'color' => BsHtml::BUTTON_COLOR_PRIMARY,
                    'id'=>'generaCURP',
                    'onClick'=>'calcula();',
                )
            ); 
        ?>
		
	</div>
        <?php echo $form->textFieldControlGroup($model,'rfc',array('class'=>'span5','maxlength'=>6)); ?>
        
        <?php echo $form->textFieldControlGroup($model,'curp',array('class'=>'span5','maxlength'=>6)); ?>

<?php $this->endWidget(); ?>
</div>
<?php endif; ?>