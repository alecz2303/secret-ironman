<?php

class InvCustomersController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete', 'index', 'view', 'create', 'update', 'delMunByEst', 'coloniaByDelMun', 'codigoByColonia'),
				'expression' => array('InvCustomersController', 'allowOnlyGroup'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public static function allowOnlyGroup() {
		$i = 0;
		if (!Yii::App()->user->isGuest) {
			foreach (Yii::app()->user->adSecurityGroups as $group) {
				if ($group == 'appInventarios' || $group == 'Administradores') {
					$i++;
				}
			}
			if ($i > 0) {
				return true;
			}
		}
		
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
				'model' => $this->loadModel($id),
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new InvCustomers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['InvCustomers'])) {
			$model->attributes    = $_POST['InvCustomers'];
			$people               = new InvPeople;
			$people->first_name   = $model->first_name;
			$people->last_name    = $model->last_name;
			$people->email        = $model->email;
			$people->phone_number = $model->phone_number;
			$people->address1     = $model->address1;
			$people->address2     = $model->address2;
			$people->estado       = $model->estado;
			$people->mnpio        = $model->mnpio;
			$people->col          = $model->col;
			$people->cp           = $model->cp;
			$people->comments     = $model->comments;

			if ($people->save()) {
				$model->people_id = $people->id;
				$model->deleted   = 0;
				if ($model ->save()) {
					Yii::app()->user->setFlash('success', 'Se ha creado el Cliente <b>'.$model->first_name.' '.$model->last_name.'</b>.');
					$this->redirect(array('view', 'id' => $model->id));
				}
			}
		}

		$this->render('create', array(
				'model' => $model,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model               = $this->loadModel($id);
		$people              = InvPeople::model()->findByPk($model->people_id);
		$model->first_name   = $people->first_name;
		$model->last_name    = $people->last_name;
		$model->email        = $people->email;
		$model->phone_number = $people->phone_number;
		$model->address1     = $people->address1;
		$model->address2     = $people->address2;
		$model->estado       = $people->estado;
		$model->mnpio        = $people->mnpio;
		$model->col          = $people->col;
		$model->cp           = $people->cp;
		$model->comments     = $people->comments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['InvCustomers'])) {
			$model->attributes    = $_POST['InvCustomers'];
			$people               = InvPeople::model()->findByPk($model->people_id);
			$people->first_name   = $model->first_name;
			$people->last_name    = $model->last_name;
			$people->email        = $model->email;
			$people->phone_number = $model->phone_number;
			$people->address1     = $model->address1;
			$people->address2     = $model->address2;
			$people->estado       = $model->estado;
			$people->mnpio        = $model->mnpio;
			$people->col          = $model->col;
			$people->cp           = $model->cp;
			$people->comments     = $model->comments;
			if ($people->save()) {
				if ($model->save()) {
					Yii::app()->user->setFlash('info', 'Se han actualizado los datos del Cliente <b>'.$model->first_name.' '.$model->last_name.'</b>.');
				}

				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();
			$model = $this->loadModel($id);
			InvPeople::model()->deleteByPk($model->people_id);
			Yii::app()->user->setFlash('danger', 'Se ha eliminado el Cliente <b>'.$model->first_name.' '.$model->last_name.'</b>.');

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl'])?$_POST['returnUrl']:array('admin'));
			}
		} else {

			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('InvCustomers');
		$this->render('index', array(
				'dataProvider' => $dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new InvCustomers('search');
		$model->unsetAttributes();// clear any default values
		if (isset($_GET['InvCustomers'])) {
			$model->attributes = $_GET['InvCustomers'];
		}

		$this->render('admin', array(
				'model' => $model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = InvCustomers::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}

		return $model;
	}

	public function actionDelMunByEst() {

		$list = Codigos::model()->findAllBySql("SELECT DISTINCT c_mnpio,D_mnpio  FROM codigos WHERE c_estado='".$_POST["InvCustomers"]["estado"]."' ORDER BY D_mnpio");
		echo "<option value=\"\">--</option>";
		foreach ($list as $data)
		echo "<option value=\"{$data->c_mnpio}\">{$data->D_mnpio}</option>";
	}

	public function actionColoniaByDelMun() {
		$list = Codigos::model()->findAllBySql("SELECT DISTINCT id_asenta_cpcons,d_asenta,d_codigo  FROM codigos WHERE c_estado='".$_POST["InvCustomers"]["estado"]."' AND c_mnpio='".$_POST["InvCustomers"]["mnpio"]."' GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
		echo "<option value=\"\">--</option>";
		foreach ($list as $data)
		echo "<option value=\"{$data->id_asenta_cpcons}\">{$data->d_codigo} | {$data->d_asenta}</option>";
	}

	public function actionCodigoByColonia() {
		$list = Codigos::model()->findAllBySql("SELECT id,d_codigo FROM codigos WHERE c_estado=".$_POST["InvCustomers"]["estado"]." AND c_mnpio=".$_POST["InvCustomers"]["mnpio"]." AND id_asenta_cpcons=".$_POST["InvCustomers"]["col"]." GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
		foreach ($list as $data)
		echo "<option value=\"{$data->id}\">{$data->d_codigo}</option>";
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'inv-customers-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}