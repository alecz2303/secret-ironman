 <?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
 	'id'                     => 'po-status-exp-form',
 	'enableClientValidation' => true,
 	'clientOptions'          => array(
 		'validateOnSubmit' => true,
 		),
 	'htmlOptions' => array('class' => 'form form-inline'),
 	));?>
 	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

 	<?php echo $form->errorSummary($model);?>

 	<?php if(!$model->isNewRecord): ?>
 		<div class="general">
 			<h1>Datos Generales</h1>
 			<div class="row">
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'expediente_DBA'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->expediente_DBA;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'libro'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->libro;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'ep'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->ep;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'folio_ini'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->folio_ini;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'folio_fin'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->folio_fin;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'fecha'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->fecha;?></p>	
 				</div>
 			</div>
 			<div class="row">
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'enajenante'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->enajenante;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'adquirente'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->adquirente;?></p>	
 				</div>
 				<div class="form-group">
 					<?php echo $form->label($model->ep0,'acto'); ?>
 					<p class="form-control-static"><?php echo $model->ep0->acto;?></p>	
 				</div>
 			</div>
 		</div>
 	<?php endif; ?>

 	<div class="cuarta-etapa">
 		<h1>4ª	 Etapa</h1>
 		<div class="row">
 			<div class="form-group">
 				<?php echo $form->labelEx($model, 'eps',array('class'=>'control-label'));?><br />
 				<?php
 				$data = $model->getMenuEp();
 				$this->widget('ext.select2.ESelect2', array(
 					'model'       => $model,
 					'attribute'   => 'eps',
 					'data'        => $data,
 					'htmlOptions' => array(
 										'empty' => '--', 
 										'class' => 'form-control',
 										'readonly'=> !$model->isNewRecord ? true : false, 
 					),
 					)
 				);
 				?>
 				<?php echo $form->error($model, 'eps');?>
 			</div>
 			<?php echo $form->textFieldControlGroup($model, 'lugar', array('class' => 'span5', 'maxlength' => 100));?>
 			<div class="form-group">
 				<?php echo $form->labelEx($model, 'tipo',array('class'=>'control-label'));?><br />
 				<?php
 				$data = array(
 								0=>'Bancos',
 								1=>'Particulares',
 								2=>'Solida',
 							  );
 				$this->widget('ext.select2.ESelect2', array(
 					'model'       => $model,
 					'attribute'   => 'tipo',
 					'data'        => $data,
 					'htmlOptions' => array(
 										'empty' => '--', 
 										'class' => 'form-control',
 										//'readonly'=> !$model->isNewRecord ? true : false, 
 					),
 					)
 				);
 				?>
 				<?php echo $form->error($model, 'tipo');?>
 			</div>
 			<?php echo $form->checkBoxControlGroup($model, 'sr');?>
 			<?php echo $form->checkBoxControlGroup($model, 'clg');?>
 			<div class="form-group">
 				<?php echo $form->labelEx($model, 'clg_fecha',array('class'=>'control-label'));?><br />
 				<?php
 				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
 					'attribute'   => 'clg_fecha',
 					'model'       => $model,
 					'language'    => 'es',
 					'htmlOptions' => array('class' => 'form-control', 'readonly' => true, 'placeHolder'=>'CLG Fecha'),
 					'options'                      => array(
 						'dateFormat'      => 'yy-mm-dd',
 						'showButtonPanel' => true,
 						'changeYear'      => true,
 						'yearRange'       => '-30',
 						),
 					));
 					?>
 					<?php echo $form->error($model, 'clg_fecha');?>
 				</div>
 				<?php echo $form->textFieldControlGroup($model, 'clg_volante');?>
 			</div>

 			<br />

 			<div class="row">
 				<?php echo $form->checkBoxControlGroup($model, 'sap');?>
 				<div class="form-group">
 					<?php echo $form->labelEx($model, 'sap_fecha',array('class'=>'control-label'));?><br />
 					<?php
 					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
 						'attribute'   => 'sap_fecha',
 						'model'       => $model,
 						'language'    => 'es',
 						'htmlOptions' => array('class' => 'form-control', 'readonly' => true, 'placeHolder'=>'Segundo Aviso P. Fecha'),
 						'options'                      => array(
 							'dateFormat'      => 'yy-mm-dd',
 							'showButtonPanel' => true,
 							'changeYear'      => true,
 							'yearRange'       => '-30',
 							),
 						));
 						?>
 						<?php echo $form->error($model, 'sap_fecha');?>
 					</div>
 					<?php echo $form->textFieldControlGroup($model, 'sap_volante');?>
 					<div class="form-group">
 						<?php echo $form->label($model, 'itd',array('class'=>'control-label'));?><br />
 						<?php
 						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
 							'attribute'   => 'itd',
 							'model'       => $model,
 							'language'    => 'es',
 							'htmlOptions' => array('class' => 'form-control', 'readonly' => true, 'placeHolder'=>'Fecha ITD'),
 							'options'                      => array(
 								'dateFormat'      => 'yy-mm-dd',
 								'showButtonPanel' => true,
 								'changeYear'      => true,
 								'yearRange'       => '-30',
 								),
 							));
 							?>
 							<?php echo $form->error($model, 'itd');?>
 						</div>
 					</div>


 					<div class="row">
 						<?php echo $form->textAreaControlGroup($model, 'notas', array('rows' => 6, 'cols' => 100));?>
 					</div>

 				</div>

 				<div class="quinta-etapa">
 					<h1>5ª Etapa</h1>
 					<div class="row">
 						<?php echo $form->checkBoxControlGroup($model, 'apendice');?>
 						<?php echo $form->checkBoxControlGroup($model, 'declaranot');?>
 						<?php echo $form->checkBoxControlGroup($model, 'legajo');?>
 					</div>
 				</div>

 				<div class="sexta-etapa">
 					<h1>6ª Etapa</h1>
 					<div class="row">
 						<div class="form-group">
 							<?php echo $form->labelEx($model, 'rpp');?><br />
 							<?php
 							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
 								'attribute'   => 'rpp',
 								'model'       => $model,
 								'language'    => 'es',
 								'htmlOptions' => array('class' => 'form-control', 'readonly' => true),
 								'options'                      => array(
 									'dateFormat'      => 'yy-mm-dd',
 									'showButtonPanel' => true,
 									'changeYear'      => true,
 									'yearRange'       => '-30',
 									),
 								));
 							?>
 							<?php echo $form->error($model, 'rpp');?>
 						</div>
 						<?php echo $form->textFieldControlGroup($model, 'rpp_volante');?>
 						<?php echo $form->textFieldControlGroup($model, 'delegacion');?>
 					</div>
 				</div>

 					<div class="septima-etapa">
 						<h1>7ª Etapa</h1>
 						<?php echo $form->checkBoxControlGroup($model, 'nc');?>
 						<div class="form-group">
 							<?php echo $form->labelEx($model, 'r_rpp');?><br />
 							<?php
 							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
 								'attribute'   => 'r_rpp',
 								'model'       => $model,
 								'language'    => 'es',
 								'htmlOptions' => array('class' => 'form-control', 'readonly' => true),
 								'options'                      => array(
 									'dateFormat'      => 'yy-mm-dd',
 									'showButtonPanel' => true,
 									'changeYear'      => true,
 									'yearRange'       => '-30',
 									),
 								));
 								?>
 								<?php echo $form->error($model, 'r_rpp');?>
 							</div>
 						<?php if ($model->tipo==='0'): ?>
 							<?php echo $form->checkBoxControlGroup($model, 'clg_salida');?>
 							<div class="form-group">
				 				<?php echo $form->labelEx($model, 'clg_salida_fecha',array('class'=>'control-label'));?><br />
				 				<?php
				 				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				 					'attribute'   => 'clg_salida_fecha',
				 					'model'       => $model,
				 					'language'    => 'es',
				 					'htmlOptions' => array('class' => 'form-control', 'readonly' => true, 'placeHolder'=>'CLG Fecha'),
				 					'options'                      => array(
				 						'dateFormat'      => 'yy-mm-dd',
				 						'showButtonPanel' => true,
				 						'changeYear'      => true,
				 						'yearRange'       => '-30',
				 						),
				 					));
				 					?>
				 					<?php echo $form->error($model, 'clg_salida_fecha');?>
				 				</div>
				 				<?php echo $form->textFieldControlGroup($model, 'clg_salida_volante');?>
 						<?php endif; ?>
 						<div class="row">
	 						<?php echo $form->textAreaControlGroup($model, 'status', array('rows' => 3, 'cols' => 100));?>
	 						<div class="form-group">
				 				<?php echo $form->labelEx($model, 'entregada',array('class'=>'control-label'));?><br />
				 				<?php
				 				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				 					'attribute'   => 'entregada',
				 					'model'       => $model,
				 					'language'    => 'es',
				 					'htmlOptions' => array('class' => 'form-control', 'readonly' => true, 'placeHolder'=>'CLG Fecha'),
				 					'options'                      => array(
				 						'dateFormat'      => 'yy-mm-dd',
				 						'showButtonPanel' => true,
				 						'changeYear'      => true,
				 						'yearRange'       => '-30',
				 						),
				 					));
				 				?>
				 				<?php echo $form->error($model, 'entregada');?>
				 			</div>
	 						<?php if (!$model->isNewRecord):?>
	 							<?php echo $form->checkBoxControlGroup($model, 'terminada');?>
	 						<?php endif; ?>
	 					</div>
 					<div class="row">
 					</div>

 					
 						<br />
 					</div>
 						<?php echo BsHtml::submitButton($model->isNewRecord ? BsHtml::iconFA(BsHtml::FA_SAVE) .' Crear' : BsHtml::iconFA(BsHtml::FA_SAVE) .' Salvar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY,'size' => BsHtml::BUTTON_SIZE_LARGE)); ?>
 					<?php $this->endWidget();?>