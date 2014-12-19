<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'pe-folios-control-expediente-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form'),
)); 

Yii::app()->clientScript->registerScript('actualiza', "
    $('#cancela').click(function(){
        var folioini = document.getElementById('PeFoliosControlExpediente_folio_ini');
        var foliofin = document.getElementById('PeFoliosControlExpediente_folio_fin');
        var resp = confirm('Se cancelaran del Folio: ' + folioini.value + ' al Folio: ' + foliofin.value);
        if(resp===true){
            document.getElementById('PeFoliosControlExpediente_canc').value='SI';
            var resp1 = confirm('Se inutiliza la escritura?');
            if (resp1!==true){
                document.getElementById('PeFoliosControlExpediente_ep').value='F. I.-".$model->id."';
            }
            document.forms['pe-folios-control-expediente-form'].submit();
        }
    });
    $('#PeFoliosControlExpediente_foliosxusar').change(function(){
            var folios = document.getElementById('PeFoliosControlExpediente_foliosxusar');
            var folioini = document.getElementById('PeFoliosControlExpediente_folio_ini');
            //alert ('Numero de Folios a usar. ' + folios.value);
            var foliofin = ( parseFloat(folios.value) + parseFloat(folioini.value) - 1);
            document.getElementById('PeFoliosControlExpediente_folio_fin').value = foliofin;
    });
");

?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php 
            $ep = new PeFoliosEp; 
            $epvalor = $ep->findByPk(1);
            $escritura = $epvalor->EP+1;
            
            $folio = new PeFoliosFolios;
            $sql = ('SELECT max(FoliosUsados) as FoliosUsados FROM pe_folios_folios');
            $foliovalor = $folio->findBySql($sql);
            $folioini = $foliovalor->FoliosUsados+1;
            
            $libro = new PeFoliosLibros;
            $sql = ('SELECT Libro FROM pe_folios_libros WHERE  (select max(FoliosUsados)+1 from pe_folios_folios) between FIni and FFin');
            $librovalor = $libro->findBySql($sql);
            $libroini = $librovalor->Libro;
        ?>
	<?php echo $form->textFieldControlGroup($model,'ep',array('class'=>'span5','maxlength'=>15,'value'=> $model->isNewRecord ? $escritura:$model->ep)); ?>
        
	<?php echo $form->textFieldControlGroup($model,'libro',array('class'=>'span5','maxlength'=>6,'readonly'=>'readonly','value'=> $model->isNewRecord ? $libroini:$model->libro)); ?>
        
        <?php echo $form->textFieldControlGroup($model,'foliosxusar',array('class'=>'span5','maxlength'=>15,'value'=>$model->isNewRecord ?'':($model->folio_fin-$model->folio_ini)+1)); ?>

	<?php echo $form->textFieldControlGroup($model,'folio_ini',array('class'=>'span5','maxlength'=>7,'readonly'=>'readonly','value'=>$model->isNewRecord ?$folioini:$model->folio_ini)); ?>

	<?php echo $form->textFieldControlGroup($model,'folio_fin',array('class'=>'span5','maxlength'=>7,'readonly'=>'readonly')); ?>
    
    <div class="form-group">
	<?php echo $form->labelEx($model,'fecha',array('class'=>'control-label'));?>
    <?php 
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'attribute'=>'fecha',
            'model'=>$model,
            'language'=>'es',
            'htmlOptions'=>array('class'=>'form-control'),
            'options'=>array(
                'dateFormat'=>'yy-mm-dd',
                
            ),
        ));
    ?>
    <?php echo $form->error($model,'fecha'); ?>
    </div>

	<?php echo $form->textFieldControlGroup($model,'acto',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldControlGroup($model,'enajenante',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldControlGroup($model,'adquirente',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldControlGroup($model,'expediente_DBA',array('class'=>'span5','maxlength'=>7)); ?>
        
	<?php if(!$model->isNewRecord):?>
            <?php echo $form->textFieldControlGroup($model,'canc',array('class'=>'span5','maxlength'=>2)); ?>
        <?php endif;?>

	<?php echo BsHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>             
        
        <?php if(!$model->isNewRecord): ?>
            <?php echo BsHtml::button(
                'Cancelar Folios',
                array(
                    'color'=>BsHtml::BUTTON_COLOR_WARNING,
                    'id'=>'cancela'
                )
                ); 
            ?>
        <?php endif;?>

<?php $this->endWidget(); ?>
