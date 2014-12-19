<?php /* @var $this Controller */?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php
$cs        = Yii::app()->clientScript;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
	->registerCssFile($themePath.'/assets/css/bootstrap.css')
	->registerCssFile($themePath.'/assets/css/bootstrap-theme.css');

/**
 * JavaScripts
 */
$cs
	->registerCoreScript('jquery', CClientScript::POS_END)
	->registerCoreScript('jquery.ui', CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/bootstrap.min.js', CClientScript::POS_END)

	->registerScript('tooltip',
	"$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
	, CClientScript::POS_READY);

?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl?>/assets/js/respond.min.js"></script>
<![endif]-->

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/alecz/clock/clock.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/alecz/js/autoResize.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/alecz/bfh/js/bootstrap-formhelpers.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/alecz/bfh/css/bootstrap-formhelpers.css" />

        <link href="http://fonts.googleapis.com/css?family=VT323|Revalia|Julius+Sans+One|Sue+Ellen+Francisco|Patrick+Hand+SC" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl;?>/img/favicon.ico" type="image/x-icon" />
        <title><?php echo $this->pageTitle;?></title>
</head>

<body>

<?php $this->widget('bootstrap.widgets.BsNavbar', array(
		'collapse'   => true,
		'brandLabel' => BsHtml::iconFA(BsHtml::FA_HOME).' '.Yii::app()->name,
		'position'   => BsHtml::NAVBAR_POSITION_FIXED_TOP,
		'color'      => BsHtml::NAVBAR_COLOR,
		'htmlOptions' => array(
			'containerOptions' => array(
				'fluid' => true
			),
		),
		'brandUrl' => Yii::app()->homeUrl,
		'items'    => array(
			
			array(
				'class'           => 'bootstrap.widgets.BsNav',
				'type'            => BsHtml::NAV_TYPE_NAVBAR,
				'activateParents' => true,
				'items'           => array(
					array(
						'label'   => '<i class="fa fa-book fa-fw"></i> Manuales',
						'visible' => !Yii::app()->user->isGuest,
						'url'	  => '#',
						'items'   => array(
	                        BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_BOOKMARK), array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:32px;'
	                        )),
							array(
								'label' => '<i class="fa fa-file-text-o fa-fw"></i> Manuales Notaria',
								'url'   => array('/site/page', 'view' => 'manuales'),
							),
							array(
								'label' => '<i class="fa fa-file-text-o fa-fw"></i> Manuales INME',
								'url'   => array('/site/page', 'view' => 'manualesinme'),
							),
						),
					),
					array(
						'label'   => '<i class="fa fa-chain fa-fw"></i> Referencia',
						'visible' => !Yii::app()->user->isGuest,
						'url'	  => '#',
						'items'   => array(
	                        BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_BOOKMARK), array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:32px;'
	                        )),
	                        BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_FOLDER_O).' Protocolo Ordinario', array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:20px;'
	                        )),
							array(
								'label' => '<i class="fa fa-archive fa-fw"></i> Contról de Folios',
								'url'   => array('/poFoliosControlExpediente/admin'),
							),
							array(
								'label' => '<i class="fa fa-search fa-fw"></i> Busqueda de Respaldo de Escrituras en Libros',
								'url'   => array('/site/buscaPo'),
							),
							array(
								'label' => '<i class="fa fa-bar-chart-o fa-fw"></i> Estatus de Expedientes',
								'url'   => array('/poStatusExp/admin'),
							),
							BsHtml::menuDivider(),
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_FOLDER_O).' Protocolo Especial', array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:20px;'
	                        )),
							array(
								'label' => '<i class="fa fa-archive fa-fw"></i> Contról de Folios',
								'url'   => array('/peFoliosControlExpediente/admin'),
							),
							array(
								'label' => '<i class="fa fa-search fa-fw"></i> Busqueda de Respaldo de Escrituras en Libros',
								'url'   => array('/site/buscaPe'),
							),
							array(
								'label' => '<i class="fa fa-bar-chart-o fa-fw"></i> Estatus de Expedientes',
								'url'   => array('/peStatusExp/admin'),
							),
							BsHtml::menuDivider(),
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_FOLDER_O).' Testimonios', array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:20px;'
	                        )),
							array(
								'label' => '<i class="fa fa-file fa-fw"></i> Testimonios INFONAVIT',
								'url'   => array('/testimonioInfonavit/admin'),
							),
							array(
								'label' => '<i class="fa fa-file-o fa-fw"></i> Testimonios PROTOCOLO ORDINARIO',
								'url'   => array('/testimonioPo/admin'),
							),
						),
					),
					array(
						'label'   => '<i class="fa fa-print fa-fw"></i> Reportes',
						'visible' => !Yii::app()->user->isGuest,
						'url'	  => '#',
						'items'   => array(
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_BOOKMARK), array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:32px;'
	                        )),
	                        BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_PRINT).' Protocolo Ordinario', array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:18px;',
	                        )),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes sin Terminar',
								'url'   => array('/reports/poStatusExp'),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes p/Notario Bancos',
								'url'   => array('/reports/poStatusExpNot','tipo'=>0),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes p/Notario Particulares',
								'url'   => array('/reports/poStatusExpNot','tipo'=>1),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes p/Notario Solida',
								'url'   => array('/reports/poStatusExpNot','tipo'=>2),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Expedientes Terminados',
								'url'   => array('/reports/poStatusExpTerm'),
							),
							BsHtml::menuDivider(),
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_PRINT).' Protocolo Especial', array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:18px;',
	                        )),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes sin Terminar',
								'url'   => array('/reports/peStatusExp'),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes p/Notario INFONAVIT',
								'url'   => array('/reports/peStatusExpNot','tipo'=>0),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes p/Notario Promotora Vivienda',
								'url'   => array('/reports/peStatusExpNot','tipo'=>1),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Estatus Expedientes p/Notario Secretaria de Educación',
								'url'   => array('/reports/peStatusExpNot','tipo'=>2),
							),
							array(
								'label' => BsHtml::iconFA(BsHtml::FA_FILE_PDF_O).' Expedientes Terminados',
								'url'   => array('/reports/peStatusExpTerm'),
							),
							BsHtml::menuDivider(),
							array(
								'label' => '<i class="fa fa-file-text-o fa-fw"></i> Tabla de Expedientes Anuales',
								'url'   => array('/site/page', 'view' => 'pivot'),
							),
	                    ),
	                ),
					array(
						'label'   => '<i class="fa fa-cubes fa-fw"></i> Inventarios',
						'visible' => !Yii::app()->user->isGuest,
						'url'	  => '#',
						'items'   => array(
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_BOOKMARK), array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:32px;'
	                        )),
							array(
								'label' => '<i class="fa fa-group fa-fw"></i> Clientes',
								'url'   => array('/invCustomers/admin'),
							),
							array(
								'label' => '<i class="fa fa-truck fa-fw"></i> Proveedores',
								'url'   => array('/invSuppliers/admin'),
							),
							array(
								'label' => '<i class="fa fa-tag fa-fw"></i> Items',
								'url'   => array('/invItem/admin'),
							),
							array(
								'label' => '<i class="fa fa-check-square-o fa-fw"></i> Recepciones',
								'url'   => array('/invReceivings/admin'),
							),
							array(
								'label' => '<i class="fa fa-shopping-cart fa-fw"></i> Salidas',
								'url'   => array('/invSales/admin'),
							),
							BsHtml::menuDivider(),
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_PRINT).' Reportes', array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:18px;',
	                        )),
							array(
								'label' => '<i class="fa fa-file-pdf-o fa-fw"></i> Reporte Inventario Total',
								'url'   => array('/reports/invTot'),
								'linkOptions'                         => array(
									'target' => '_blank',
								),
							),
							array(
								'label' => '<i class="fa fa-file-pdf-o fa-fw"></i> Reporte Reorden',
								'url'   => array('/reports/invFalt'),
								'linkOptions'                         => array(
									'target' => '_blank',
								),
							),
							array(
								'label' => '<i class="fa fa-file-pdf-o fa-fw"></i> Reporte de Toner',
								'url'   => array('/reports/pdfToner'),
								'linkOptions'                         => array(
									'target' => '_blank',
								),
							),
						),
					),
					array(
						'label'   => '<i class="fa fa-book fa-fw"></i> Páginas de Interes',
						'visible' => !Yii::app()->user->isGuest,
						'url'	  => '#',
						'items'   => array(
							BsHtml::menuHeader(BsHtml::iconFA(BsHtml::FA_BOOKMARK), array(
	                            'class' => 'text-center',
	                            'style' => 'color:#7A0C0C;font-size:32px;'
	                        )),
							array(
								'label' => '<i class="fa fa-magic fa-fw"></i> Calculadora RFC y CURP',
								'url'   => array('/site/calculacurp'),
							),
							array(
								'label' => '<i class="fa fa-location-arrow fa-fw"></i> Códigos Postales de México',
								'url'   => array('/site/cp'),
							),
							array(
								'label'       => '<i class="fa fa-desktop fa-fw"></i> Declaración Electrónica Municipal',
								'url'         => 'https://tesoreria.tuxtla.gob.mx/dem/',
								'linkOptions' => array('target' => '_blank'),
							),
							array(
								'label'       => '<i class="fa fa-desktop fa-fw"></i> Registro Local de Aviso de Testamento Chiapas',
								'url'         => 'http://www.consejeriajuridica.chiapas.gob.mx/notarias/',
								'linkOptions' => array('target' => '_blank'),
							),
							array(
								'label'       => '<i class="fa fa-desktop fa-fw"></i> Expedientes San Cristobal de las Casas',
								'url'         => array('/sccExpedientes/admin'),
							),
						),
					),
					array(
						'label' => '<i class="fa fa-power-off fa-fw"></i> Login',
						'url'   => array('/site/login'),
						'visible' => Yii::app()->user->isGuest,
					),
					array(
						'label' => '<i class="fa fa-power-off fa-fw"></i> Logout ('.Yii::app()->user->name.')',
						'url'   => array('/site/logout'),
						'visible' => !Yii::app()->user->isGuest,
					),
					array(
						'label' => '<i class="fa fa-question fa-fw"></i> Ayuda',
						'url'   => 'http://'.$_SERVER["HTTP_HOST"].'/manuales/manual.http',
					),
				),
				'htmlOptions' => array(
					'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT
				)
			),
		),
	));?>
<div class="container" id="page">

<?php if (isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.BsBreadcrumb', array(
		'links' => $this->breadcrumbs,
	));?><!-- breadcrumbs -->
<?php endif?>

<?php if (($msgs = Yii::app()->user->getFlashes()) !== null):?>
    <?php foreach ($msgs as $type => $message):?>
    <?php
echo BsHtml::alert($type, $message);
?>
<?php endforeach;?>
<?php endif;?>

<?php echo $content;?>

	<div class="clear"></div>

</div><!-- page -->

<footer class="callout footer bg-ft clearfix pd4">
    </footer>
 <section class="footer-credits">
    <div class="container">
        <ul class="clearfix">
            <!--<li>© 2014 Kerberos IT Services. All rights reserved.</li>-->
            <li><a href="<?php echo Yii::app()->request->baseUrl;?>/site/contact"><i class="fa fa-envelope fa-fw"></i> Contáctanos</a></li>
            <li><a href="tel:<?php echo Yii::app()->params['tel'];?>" class="tele"><i class="fa fa-mobile-phone fa-fw"></i> <?php echo Yii::app()->params['tel'];
?></a></li>
            <!--<li><a href="<?php echo Yii::app()->params['fb'];?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?php echo Yii::app()->params['tw'];?>"><i class="fa fa-twitter"></i></a></li>-->
        </ul>
    </div>
    <!--close footer-credits container-->
</section>



</body>
</html>
