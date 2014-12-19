<td>
    <?php echo CHtml::activeDropDownList($model,"[$index]item_id",$model->getMenuItems(),array('class'=>'inputItem','empty'=>'--','onChange'=>'calcula(this);')); ?>
    <?php echo CHtml::error($model,"[$index]item_id"); ?>
</td>
    
<td>
    <?php echo CHtml::activeTextField($model,"[$index]description",array('class'=>'inputDescription','readonly'=>'readonly')); ?>
    <?php echo CHtml::error($model,"[$index]description"); ?>
</td>
    
<td>
    <?php echo CHtml::activeTextField($model,"[$index]serialnumber",array('class'=>'inputSerialNumber','onBlur'=>'valida(this);')); ?>
    <?php echo CHtml::error($model,"[$index]serialnumber"); ?>
</td>

<td>
    <?php echo CHtml::activeTextField($model,"[$index]qty_purchased",array('class'=>'inputQty_purchased','value'=>1 ,'onBlur'=>'suma(this);')); ?>
    <?php echo CHtml::error($model,"[$index]qty_purchased"); ?>
</td>

<td>
    <?php echo CHtml::activeTextField($model,"[$index]item_cost_price",array('class'=>'inputItem_cost_prices','onBlur'=>'suma(this);','readonly'=>'readonly')); ?>
    <?php echo CHtml::error($model,"[$index]item_cost_price"); ?>
</td>

<td>
    <?php echo CHtml::activeTextField($model,"[$index]item_unit_price",array('class'=>'inputItem_unit_prices','onBlur'=>'suma(this);','readonly'=>'readonly')); ?>
    <?php echo CHtml::error($model,"[$index]item_unit_price"); ?>
</td>

<td>
    <?php echo CHtml::activeTextField($model,"[$index]discount_percent",array('class'=>'inputDiscount_percent','value'=>0,'onBlur'=>'suma(this);')); ?>
    <?php echo CHtml::error($model,"[$index]discount_percent"); ?>
</td>

<td>
    <?php echo CHtml::activeTextField($model,"[$index]total",array('class'=>'inputTotal','readonly'=>'readonly')); ?>
    <?php echo CHtml::error($model,"[$index]total"); ?>
</td>
