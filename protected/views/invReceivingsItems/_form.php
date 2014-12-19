<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/alecz/js/receivings.js');
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm',array(
	'id'=>'inv-receivings-items-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array('class'=>'form','onsubmit'=>'return validateForm()'),
)); ?>

<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>


<?php 
$model= new InvReceivings();
?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
        <?php echo $form->labelEx($model,'suplier_id',array('class'=>'control-label')); ?>
        <?php 
            $htmlOptions=array(
			"empty"=>"--",
			"class"=>"form-control",
		);
            $data = $model->getMenuSuppliers();
            $this->widget('ext.select2.ESelect2',array(
                    'model'=>$model,
                    'attribute'=>'suplier_id',
                    'data'=>$data,
                    'htmlOptions'=>$htmlOptions,
                )
            ); 
            ?>
        <?php echo $form->error($model,'suplier_id');?>
        </div>

        <?php echo $form->textAreaControlGroup($model,'comment',array('rows'=>2));?>
<?php 
    $models = array(
        new InvReceivingsItems,
    );
    $this->widget('ext.widgets.tabularinput.XTabularInput',array(
    'id'=>'mitabla',
    'models'=>$models,
    'containerTagName'=>'table',
    'headerTagName'=>'thead',
    'header'=>'
        <tr align="center">
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'item_id').'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'description').'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'serialnumber').'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'qty_purchased').'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'item_cost_price',array('class'=>'inputItem_cost_price')).'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'item_unit_price',array('class'=>'inputItem_unit_price')).'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'discount_percent').'</td>
            <td>'.CHtml::activeLabelEX(InvReceivingsItems::model(),'total').'</td>
            <td></td>
        </tr>
    ',
    'inputContainerTagName'=>'tbody',
    'inputTagName'=>'tr',
    'inputView'=>'_tabularInputAsTable',
    'inputUrl'=>$this->createUrl('request/addTabularInputsAsTableReceivings'),
    'addTemplate'=>'<tbody><tr class="border_top"><td colspan="9">{link}</td></tr></tbody>',
    'addLabel'=>Yii::t('ui','Agregar nueva fila'),
    'addHtmlOptions'=>array('class'=>'btn btn-info','onClick'=>'validateForm();'),
    'removeTemplate'=>'<td>{link}</td>',
    'removeLabel'=>Yii::t('ui','<i class="fa fa-trash-o fa-fw"></i>'),
    'removeHtmlOptions'=>array('class'=>'btn btn-danger'),
));
?>
          <?php echo $form->textFieldControlGroup($model,'grand',array('class'=>'span3 text-center','readonly'=>'readonly'));?>
            
                
        <?php echo BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

          <?php echo $form->textFieldControlGroup($model,'item_id',array('class'=>'id_item')); ?>
          <?php echo $form->textFieldControlGroup($model,'description',array('class'=>'description')); ?>
          <?php echo $form->textFieldControlGroup($model,'qty_purchased',array('class'=>'qty_purchased')); ?>
          <?php echo $form->textFieldControlGroup($model,'item_unit_price',array('class'=>'item_unit_price')); ?>



<?php $this->endWidget();