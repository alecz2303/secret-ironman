<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/alecz/js/sales.js');
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'inv-sales-items-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form','onsubmit'=>'return validateForm()'),
)); ?>

<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>


<?php 
$model= new InvFullNameCustomer();
?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
        <?php echo $form->labelEx($model,'id',array('class'=>'control-label')); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
		);
            $data = $model->getMenuCustomers();
            $this->widget('ext.select2.ESelect2',array(
                    'model'=>$model,
                    'attribute'=>'id',
                    'data'=>$data,
                    'htmlOptions'=>$htmlOptions,
                )
            ); 
            ?>
        <?php echo $form->error($model,'id');?>
        </div>

          <?php echo $form->textAreaControlGroup($model,'comment',array('rows'=>2));?>
<?php 
    $models = array(
        new InvSalesItems,
    );
    $this->widget('ext.widgets.tabularinput.XTabularInput',array(
    'id'=>'mitabla',
    'models'=>$models,
    'containerTagName'=>'table',
    'containerHtmlOptions'=>array('onchange'=>'validateForm();'),
    'headerTagName'=>'thead',
    'header'=>'
        <tr align="center">
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'item_id').'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'description').'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'serialnumber').'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'qty_exist').'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'qty_purchased').'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'item_cost_price',array('class'=>'inputItem_cost_price')).'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'item_unit_price',array('class'=>'inputItem_unit_price')).'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'discount_percent').'</td>
            <td>'.CHtml::activeLabelEX(InvSalesItems::model(),'total').'</td>
            <td></td>
        </tr>
    ',
    'inputContainerTagName'=>'tbody',
    'inputTagName'=>'tr',
    'inputView'=>'_tabularInputAsTable',
    'inputUrl'=>$this->createUrl('request/addTabularInputsAsTable'),
    'addTemplate'=>'<tbody><tr class="border_top"><td colspan="9">{link}</td></tr></tbody>',
    'addLabel'=>Yii::t('ui','Agregar nueva fila'),
    'addHtmlOptions'=>array('class'=>'btn btn-info','onClick'=>'validateForm();'),
    'removeTemplate'=>'<td> {link}</td>',
    'removeLabel'=>Yii::t('ui','<i class="fa fa-trash-o fa-fw"></i> Eliminar linea'),
    'removeHtmlOptions'=>array('class'=>'btn btn-danger btn-xs','onClick'=>'validateForm();'),
));
?>
          <?php echo $form->textFieldControlGroup($model,'grand',array('class'=>'text-center','readonly'=>'readonly'));?>
            

          <?php echo $form->textFieldControlGroup($model,'item_id',array('class'=>'id_item')); ?>
          <?php echo $form->textFieldControlGroup($model,'description',array('class'=>'description')); ?>
          <?php echo $form->textFieldControlGroup($model,'qty_purchased',array('class'=>'qty_purchased')); ?>
          <?php echo $form->textFieldControlGroup($model,'item_unit_price',array('class'=>'item_unit_price')); ?>
          <?php echo $form->textFieldControlGroup($model,'qty_exist',array('class'=>'item_qty_exist')); ?>

        <br /><br /><br />      
            <?php echo BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
        


<?php $this->endWidget(); ?>