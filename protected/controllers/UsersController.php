<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','admin','delete','create','update','delMunByEst','coloniaByDelMun',
					'codigoByColonia','assign'),
				'roles'=>array('super'),
				//'ips'=>array('192.168.1.246'),
			),
                        array('allow',
                                'actions'=>array('changepassword'),
                                'users'=>array('@'),
                        ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$role=new RoleForm;

		if(isset($_POST["ajax"]) and $_POST['ajax']==='role-form'){
			echo CActiveForm::validate($role);
			Yii::app()->end();
		}

		if(isset($_POST["RoleForm"])){
			$role->attributes=$_POST['RoleForm'];
			if($role->validate()){
				Yii::app()->authManager->createRole($role->name,$role->description);
				Yii::app()->authManager->assign($role->name,$id);

				$this->redirect(array('update','id'=>$model->id));
			}
		}

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'role'=>$role,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->password= $model->generateSalt('md5',$model->password,HASH_KEY);
                        $model->date=date('Y-m-d');
                        $model->time=date('H:i:s');
			if($model->save()){
                                Yii::app()->user->setFlash('success','Se ha creado al usuario <b>'.$model->nombre.' '.$model->ap_paterno.' '.$model->ap_materno.'</b>.');
				$this->redirect(array('view','id'=>$model->id));
                        }
                        else{
                                Yii::app()->user->setFlash('error','No se ha podido crear el usuario. Intente nuevamente más tarde.');
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save()){
				Yii::app()->user->setFlash('success','Se han actualizado los datos del usuario <b>'.$model->nombre.' '.$model->ap_paterno.' '.$model->ap_materno.'</b>.');
                                $this->redirect(array('view','id'=>$model->id));
                        }
                        else{
                                Yii::app()->user->setFlash('error','No se han podido actualizar los datos. Intente nuevamente más tarde.');
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
                $this->loadModel($id)->delete();
                Yii::app()->user->setFlash('warning','Se ha eliminado al usuario <b>'.$model->nombre.' '.$model->ap_paterno.' '.$model->ap_materno.'</b>.');

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//Yii::app()->authManager->createRole("admin");
		//Yii::app()->authManager->assign("admin",1);
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAssign($id){
		if(Yii::app()->authManager->checkAccess($_GET["item"],$id)){
			Yii::app()->authManager->revoke($_GET["item"],$id);
		}
		else{
			Yii::app()->authManager->assign($_GET["item"],$id);
		}
		$this->redirect(array("view","id"=>$id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionDelMunByEst(){

            $list=Codigos::model()->findAllBySql("SELECT DISTINCT c_mnpio,D_mnpio  FROM codigos WHERE c_estado='".$_POST["Users"]["estado"]."' ORDER BY D_mnpio");
            echo"<option value=\"\">--</option>";
            foreach($list as $data)
                    echo"<option value=\"{$data->c_mnpio}\">{$data->D_mnpio}</option>";
        }

        public function actionColoniaByDelMun(){
                $list=Codigos::model()->findAllBySql("SELECT DISTINCT id_asenta_cpcons,d_asenta,d_codigo  FROM codigos WHERE c_estado='".$_POST["Users"]["estado"]."' AND c_mnpio='".$_POST["Users"]["mnpio"]."' GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
                echo"<option value=\"\">--</option>";
                foreach($list as $data)
                        echo"<option value=\"{$data->id_asenta_cpcons}\">{$data->d_codigo} | {$data->d_asenta}</option>";
        }

        public function actionCodigoByColonia(){
                $list=Codigos::model()->findAllBySql("SELECT id,d_codigo FROM codigos WHERE c_estado=".$_POST["Users"]["estado"]." AND c_mnpio=".$_POST["Users"]["mnpio"]." AND id_asenta_cpcons=".$_POST["Users"]["colonia"]." GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
                foreach($list as $data)
                        echo"<option value=\"{$data->id}\">{$data->d_codigo}</option>";
        }
        
        public function actionChangepassword($id){      
           $model = new Users;
           
           $model = Users::model()->findByAttributes(array('id'=>$id));
           $model->setScenario('changePwd');

            if(isset($_POST['Users'])){

               $model->attributes = $_POST['Users'];
               $valid = $model->validate();

               if($valid){

                 $model->password = $model->generateSalt('md5',$model->new_password,HASH_KEY);

                 if($model->save()){
                    Yii::app()->user->setFlash('success','La contraseña se ha cambiado con éxito.');
                    $this->redirect(array('changepassword','id'=>$id));
                 }
                 else{
                    Yii::app()->user->setFlash('error','La contraseña NO se ha cambiado.');
                    $this->redirect(array('changepassword','id'=>$id));
                 }
               }
            }

           $this->render('changepassword',array('model'=>$model)); 
        }

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
