<?php
$this->breadcrumbs = array(
	'Po Status Exps' => array('index'),
	$model->id,
	);

$this->menu = array(
	array('label' => '<i class="glyphicon glyphicon-list"></i> Listado PoStatusExp', 'url' => array('index')),
	array('label' => '<i class="glyphicon glyphicon-plus-sign"></i> Nuevo PoStatusExp', 'url' => array('create')),
	array('label' => '<i class="glyphicon glyphicon-edit"></i> Actualización PoStatusExp', 'url' => array('update', 'id' => $model->id)),
	array('label' => '<i class="glyphicon glyphicon-minus-sign"></i> Borrar PoStatusExp', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => '<i class="glyphicon glyphicon-tasks"></i> Administración PoStatusExp', 'url' => array('admin')),
	);
	?>

<?php 
    $this->widget('ext.mPrint.mPrint', array(
        'element'=>'#detalle',
        /*'element' => '#page', */       //the element to be printed.
        'exceptions' => array(       //the element/s which will be ignored
              '.summary',
              //'.search-form',
        ),
        'title' => 'Detalle de Expediente '.$model->ep0->expediente_DBA,
        'alt' => 'Imprimir',       //text which will appear if image can't be loaded
        'id' => 'print-div',
        'publishCss' => true,
        //'visible' => Yii::app()->user->checkAccess('print'), 
        'debug' => false,
        )
    ); 
?>

<div id="detalle">
	<?php echo BsHtml::pageHeader('Detalle','Expediente '.$model->ep0->expediente_DBA) ?>


	<?php
	$this->beginWidget('bootstrap.widgets.BsPanel', array(
	    'title' => 'Datos Generales',
	));
	?>
	<?php $this->widget('bootstrap.widgets.BsDetailView', array(
		'data'        => $model,
		'htmlOptions' => array('class' => 'table table-striped table-condensed table-hover'),
		'attributes'                   => array(
			'eps',
			'ep0.expediente_DBA',
			'ep0.libro',
			'ep0.folio_ini',
			'ep0.folio_fin',
			'ep0.fecha',
			'ep0.enajenante',
			'ep0.adquirente',
			'ep0.acto',
			),
		));
	?>
	<?php
	$this->endWidget();
	?>

	<?php
	$this->beginWidget('bootstrap.widgets.BsPanel', array(
	    'title' => '4ª Etapa',
	    'type' => BsHtml::PANEL_TYPE_SUCCESS
	));
	?>
	<?php $this->widget('bootstrap.widgets.BsDetailView', array(
		'data'        => $model,
		'htmlOptions' => array('class' => 'table table-striped table-condensed table-hover'),
		'attributes'                   => array(
			'lugar',
			array(
				'label' => 'Tipo',
				'type'  => 'raw',
				'value' => $model->tipo === '0'?'Bancos':($model->tipo==='1'?'Particulares':'Solida'),
			),
			array(
				'label' => 'Solicitud de Recursos',
				'type'  => 'raw',
				'value' => $model->sr === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			array(
				'label' => 'CLG',
				'type'  => 'raw',
				'value' => $model->clg === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			'clg_fecha',
			'clg_volante',
			array(
				'label' => 'Segundo Aviso Preventivo',
				'type'  => 'raw',
				'value' => $model->sap === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			'sap_fecha',
			'sap_volante',
			'itd',
			'notas',
			),
		));
	?>
	<?php
	$this->endWidget();
	?>

	<?php
	$this->beginWidget('bootstrap.widgets.BsPanel', array(
	    'title' => '5ª Etapa',
	    'type' => BsHtml::PANEL_TYPE_PRIMARY
	));
	?>
	<?php $this->widget('bootstrap.widgets.BsDetailView', array(
		'data'        => $model,
		'htmlOptions' => array('class' => 'table table-striped table-condensed table-hover'),
		'attributes'                   => array(
			array(
				'label' => 'Apendice',
				'type'  => 'raw',
				'value' => $model->apendice === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			array(
				'label' => 'Declaranot',
				'type'  => 'raw',
				'value' => $model->declaranot === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			array(
				'label' => 'Legajo',
				'type'  => 'raw',
				'value' => $model->legajo === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			),
		));
	?>
	<?php
	$this->endWidget();
	?>

	<?php
	$this->beginWidget('bootstrap.widgets.BsPanel', array(
	    'title' => '6ª Etapa',
	    'type' => BsHtml::PANEL_TYPE_WARNING
	));
	?>
	<?php $this->widget('bootstrap.widgets.BsDetailView', array(
		'data'        => $model,
		'htmlOptions' => array('class' => 'table table-striped table-condensed table-hover'),
		'attributes'                   => array(
			'rpp',
			'rpp_volante',
			'delegacion',
			),
		));
	?>
	<?php
	$this->endWidget();
	?>

	<?php
	$this->beginWidget('bootstrap.widgets.BsPanel', array(
	    'title' => '7ª Etapa',
	    'type' => BsHtml::PANEL_TYPE_DANGER
	));
	?>
	<?php $this->widget('bootstrap.widgets.BsDetailView', array(
		'data'        => $model,
		'htmlOptions' => array('class' => 'table table-striped table-condensed table-hover'),
		'attributes'                   => array(
			array(
				'label' => 'Nota Comp.',
				'type'  => 'raw',
				'value' => $model->nc === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			'r_rpp',
			array(
				'label' => 'Solicitud de Recursos Salida',
				'type'  => 'raw',
				'visible' => $model->tipo==='0'? true : false ,
				'value' => $model->sr_salida === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			array(
				'label' => 'CLG Salida',
				'type'  => 'raw',
				'visible' => $model->tipo==='0'? true : false ,
				'value' => $model->clg_salida === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			array(
				'label' => 'CLG Salida Fecha',
				'type'  => 'raw',
				'visible' => $model->tipo==='0'? true : false ,
				'value' => $model->clg_salida_fecha,
				),
			array(
				'label' => 'CLG Salida Volante',
				'type'  => 'raw',
				'visible' => $model->tipo==='0'? true : false ,
				'value' => $model->clg_salida_volante,
				),
			'status',
			array(
				'label' => 'Terminada',
				'type'  => 'raw',
				'value' => $model->terminada === '1'?'<i class="fa fa-check-square-o"></i>':'<i class="fa fa-square-o"></i>',
				),
			),
		));
	?>
	<?php
	$this->endWidget();
	?>
</div>