 <?php
$baseUrl = Yii::app()->basePath;
require_once($baseUrl.'/extensions/num2letras.php');
?>

<?php
$this->breadcrumbs=array(
	'Salidas de Inventario'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'<i class="glyphicon glyphicon-list"></i> Listado Salidas','url'=>array('index')),
	array('label'=>'<i class="glyphicon glyphicon-minus-sign"></i> Borrar Salida','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="glyphicon glyphicon-tasks"></i> Administración Salidas','url'=>array('admin')),
);
?>

<?php 
    $this->widget('ext.mPrint.mPrint', array(
        'element'=>'#salida',
        /*'element' => '#page', */       //the element to be printed.
        'exceptions' => array(       //the element/s which will be ignored
              '.summary',
              //'.search-form',
        ),
        'title' => 'Salida de Inventario',
        'alt' => 'Imprimir',       //text which will appear if image can't be loaded
        'id' => 'print-div',
        'publishCss' => true,
        //'visible' => Yii::app()->user->checkAccess('print'), 
        //'debug' => true,
        )
    ); 
?>

<div id="salida">
<?php echo BsHtml::pageHeader('Detalle','Salida '.$model->id) ?>
<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'data'=>$model,
        'htmlOptions'=>array('class' => 'table table-striped table-condensed table-hover'),
	'attributes'=>array(
		//'id',
		'sale_time',
		'invPeople.first_name',
		'invPeople.last_name',
		'user',
		'comment',
	),
)); ?>
<?php $detail=InvSalesItems::model(); ?>
<?php $this->widget('bootstrap.widgets.BsGridView',array(
	'id'=>'inv-sales-items-grid',
	'dataProvider'=>$detail->search($model->id),
	//'filter'=>$detail,
	'columns'=>array(
		'item.name',
		'description',
		'serialnumber',
                array( 
                    'name'=>'qty_purchased', 
                    'type'=>'raw',
                    'value'=>'$data->qty_purchased',
                    'footer'=>'SUBTOTAL:<br>IVA:<br><hr>TOTAL:',
                    'footerHtmlOptions'=>array('style'=>'font-size:18px !important;','colspan'=>'3'),
                ),
                /*array( 
                    'name'=>'item_cost_price', 
                    'type'=>'raw',
                    'value'=>'Yii::app()->format->formatNumber($data->item_cost_price)',
                    'footer'=>'SUBTOTAL:<br>IVA:<br><hr>TOTAL:',
                    'footerHtmlOptions'=>array('style'=>'font-size:18px !important;','colspan'=>'3'),
                ),*/
                array( 
                    'name'=>'item_unit_price', 
                    'type'=>'raw',
                    'value'=>'Yii::app()->format->formatNumber($data->item_unit_price)',
                    'footer'=>Yii::app()->format->formatNumber($detail->getTotal($model->id)) .'<br>'. Yii::app()->format->formatNumber($detail->getIVA($model->id)) .'<br><hr>'. Yii::app()->format->formatNumber($detail->getTotals($model->id)),
                    'footerHtmlOptions'=>array('style'=>'font-size:18px !important; text-align:right !important;','colspan'=>'3'),
                ),
                array( 
                    'name'=>'discount_percent', 
                    'value'=>'$data->discount_percent',
                    'footerHtmlOptions'=>array('style'=>'display:none'),
                ),
                array( 
                    'name'=>'total', 
                    'type'=>'raw',
                    'value'=>'Yii::app()->format->formatNumber($data->total)',
                    'footerHtmlOptions'=>array('style'=>'display:none'),
                ),
                array(
			'class'=>'bootstrap.widgets.BsButtonColumn',
                        'template'=>'{view} {delete}',
                        'buttons'=>array
                        (
                            'view' => array
                            (
                                'url'=>'Yii::app()->createUrl("invSalesItems/view", array("id"=>$data->id))',
                            ),
                            'delete' => array
                            (
                                'url'=>'Yii::app()->createUrl("invSalesItems/delete", array("id"=>$data->id))',
                            ),
                        ),
                        'footerHtmlOptions'=>array('style'=>'display:none'),
		),
	),
));
?>
<?php echo num2letras($detail->getTotals($model->id)); ?>
</div>
<hr>
    <?php
    echo CHtml::htmlbutton('<i class="fa fa-arrow-left fa-lg"></i> Regresar',array('name' => 'btnBack','onclick'=>'js:history.go(-1);returnFalse;','class'=>'btn btn-success loading confirm'));
