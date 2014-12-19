<?php

class InvSalesItemsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('admin','delete','index','view','create','update','batchUpdate','itemAll','serialNumber'),
				//'users'=>array('@'),
                                'expression'=> array('InvSalesItemsController','allowOnlyGroup'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public static function allowOnlyGroup(){
            $i=0;
            if(!Yii::App()->user->isGuest){
                foreach(Yii::app()->user->adSecurityGroups as $group){
                    if($group == 'appInventarios' || $group == 'Administradores'){
                        $i++;
                    }
                }
                if($i>0){
                    return true;
                }
            }
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
                $model=new InvSales;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['InvSalesItems']))
		{
                        $model->customer_id = $_POST['InvFullNameCustomer']['id'];
                        $model->sale_time = date("Y-m-d H:i:s");
                        $model->user = Yii::app()->user->id;
                        $model->comment = $_POST['InvFullNameCustomer']['comment'];
                        if($model->save()){
                        $i=0;
			//$model->attributes=$_POST['InvSalesItems'];
                            foreach ($_POST['InvSalesItems'] as $data){
                                $sales=new InvSalesItems;
                                $sales->sales_id = $model->id;
                                $sales->item_id = $data['item_id'];
                                $sales->description = $data['description'];
                                $sales->serialnumber = $data['serialnumber'];
                                $sales->qty_purchased = $data['qty_purchased'];
                                $sales->item_cost_price = $data['item_cost_price'];
                                $sales->item_unit_price = $data['item_unit_price'];
                                $sales->discount_percent = $data['discount_percent'];
                                if($sales->save()){
                                    $item_qty = InvItem::model()->findByPk($sales->item_id);
                                    $item_qty->quantity = $item_qty->quantity - $sales->qty_purchased ;
                                    if($item_qty->save()){
                                        Yii::app()->user->setFlash('success','Se ha guardado la recepción del item <b>'.$item_qty->name.'</b>.');
                                    }
                                    Yii::app()->user->setFlash('success','Se ha guardado la salida con éxito.');                                   
                                }
                                else{
                                    Yii::app()->user->setFlash('error','No se ha guardado la salida del item <b>'.$sales->item_id.'</b>.');
                                }
                            }
                        $this->redirect(array('/invSales/view','id'=>$model->id));
                        
                        }
                        
			//if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
                /*
                if(isset($_POST['InvSalesItems'])){
                            echo "<pre>";
                                var_dump($_POST); 
                            echo "</pre>";
                            echo $sales->item_cost_price;
                        }
                 */
                
	}        

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            /*
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InvSalesItems']))
		{
			$model->attributes=$_POST['InvSalesItems'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
             * 
             */
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
                    $model = $this->loadModel($id);
                    $item = InvItem::model()->findByPk($model->item_id);
                    $item->quantity = $item->quantity+$model->qty_purchased;
                    if($item->save()){
                        $this->loadModel($id)->delete();
                        Yii::app()->user->setFlash('success','Se ha eliminado la salida del item <b>'.$item->name.'</b>.');
                    }
                    else{
                        Yii::app()->user->setFlash('error','No se puede eliminar la salida del item <b>'.$item->name.'</b> intente de nuevo mas tarde.');
                    }
                    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                    if(!isset($_GET['ajax']))
                            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('invSales/admin'));
		}
                       
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('InvSalesItems');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new InvSalesItems('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['InvSalesItems']))
			$model->attributes=$_GET['InvSalesItems'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=InvSalesItems::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionItemAll(){

            $list=  InvItem::model()->findAllBySql("SELECT description,unit_price,cost_price,quantity  FROM inv_item WHERE id='".$_POST["item_id"]."' ORDER BY name limit 1");
            foreach($list as $data)
                    $response = array("description"=>"{$data->description}", "unit_price"=>"$data->unit_price", "cost_price"=>"$data->cost_price", "qty"=>"$data->quantity");
                    
            echo json_encode($response);
                    
        }
        
        public function actionSerialNumber(){

            $list=  InvSalesItems::model()->findAllBySql("SELECT serialnumber,sales_id  FROM inv_sales_items WHERE serialnumber='".$_POST["serialnumber"]."'");
            foreach($list as $data)
                    $response = array("serialnumber"=>"{$data->serialnumber}","salesid"=>"{$data->sales_id}");
            if(!isset($response)){        
                $response = array("serialnumber"=>"ACCEPTED");
            }
            echo json_encode($response);
        }

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inv-sales-items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
