<?php
$this->breadcrumbs = array(
	'Estatus Expedientes Protocolo Especial' => array('index'),
	$model->id,
	);

$this->menu = array(
	array('label' => '<i class="glyphicon glyphicon-list"></i> Listado Estatus Exp P.E.', 'url' => array('index')),
	array('label' => '<i class="glyphicon glyphicon-plus-sign"></i> Nuevo Estatus Exp P.E.', 'url' => array('create')),
	array('label' => '<i class="glyphicon glyphicon-edit"></i> Actualización Estatus Exp P.E.', 'url' => array('update', 'id' => $model->id)),
	array('label' => '<i class="glyphicon glyphicon-minus-sign"></i> Borrar Estatus Exp P.E.', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => '<i class="glyphicon glyphicon-tasks"></i> Administración Estatus Exp P.E.', 'url' => array('admin')),
	);
	?>

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