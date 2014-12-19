 <?php

class SiteController extends Controller {
	//public $layout = '//layouts/column2';
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class'     => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			} else {

				$this->render('error', $error);
			}
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name    = '=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject = '=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers = "From: $name <{$model->email}>\r\n" .
				"Reply-To: {$model->email}\r\n" .
				"MIME-Version: 1.0\r\n".
				"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('success', 'Gracias por escribirnos. Le responderemos lo más pronto posible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	public function actionCp() {
		$model = new CpForm;
		$this->render('cp', array('model' => $model));
	}

	public function actionBuscaPo() {
		$model = new BusquedaForm;

		$this->render('buscaPo', array('model' => $model));
	}

	public function actionBuscaPe() {
		$model = new BusquedaForm;

		$this->render('buscaPe', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login()) {
				Yii::app()->user->setFlash('info', 'Bienvenido a '.CHtml::encode(Yii::app()->name).' <b>'.Yii::app()->user->name.'</b>.');
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	public function actionCalcularfc() {
		$model = new CalcularfcForm;
		$this->render('calcularfc', array('model' => $model));
	}

	public function actionCalculacurp() {
		$model = new CalculacurpForm;
		$this->render('calculacurp', array('model' => $model));
	}

	public function actionDelMunByEst() {

		$list = Codigos::model()->findAllBySql("SELECT DISTINCT c_mnpio,D_mnpio  FROM codigos WHERE c_estado='".$_POST["CpForm"]["estado"]."' ORDER BY D_mnpio");
		echo "<option value=\"\">--</option>";
		foreach ($list as $data)
		echo "<option value=\"{$data->c_mnpio}\">{$data->D_mnpio}</option>";
	}

	public function actionColoniaByDelMun() {
		$list = Codigos::model()->findAllBySql("SELECT DISTINCT id_asenta_cpcons,d_asenta,d_codigo  FROM codigos WHERE c_estado='".$_POST["CpForm"]["estado"]."' AND c_mnpio='".$_POST["CpForm"]["mnpio"]."' GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
		echo "<option value=\"\">--</option>";
		foreach ($list as $data)
		echo "<option value=\"{$data->id_asenta_cpcons}\">{$data->d_codigo} | {$data->d_asenta}</option>";
	}

	public function actionCodigoByColonia() {
		$list = Codigos::model()->findAllBySql("SELECT id,d_codigo FROM codigos WHERE c_estado=".$_POST["CpForm"]["estado"]." AND c_mnpio=".$_POST["CpForm"]["mnpio"]." AND id_asenta_cpcons=".$_POST["CpForm"]["col"]." GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
		foreach ($list as $data)
		echo "<option value=\"{$data->id}\">{$data->d_codigo}</option>";
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionMps(){
		$list=  Expedientes::model()->findAllBySql("SELECT DISTINCT id, Dia, Mes, Anno, Expediente, Tipo, Operacion, Instrumento, Abogado, Cliente, Solicita FROM expedientes");
        foreach($list as $data){
                $response[] = array("Dia"=>"{$data->Dia}","Mes"=>"{$data->Mes}","Año"=>"{$data->Anno}","Expediente"=>"{$data->Expediente}","Tipo"=>"{$data->Tipo}","Operacion"=>"{$data->Operacion}","Instrumento"=>"{$data->Instrumento}","Abogado"=>"{$data->Abogado}","Cliente"=>"{$data->Cliente}","Solicita"=>"{$data->Solicita}");
               }
        echo json_encode($response);
	}
}