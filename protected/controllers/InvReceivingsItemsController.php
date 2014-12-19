<?php

class InvReceivingsItemsController extends Controller
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
				'actions'=>array('admin','delete','index','view','create','update','selectDescription','itemAll','serialNumber'),
				//'users'=>array('@'),
                                'expression'=> array('InvReceivingsItemsController','allowOnlyGroup'),
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
		$model=new InvReceivings;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['InvReceivingsItems']))
		{
                        //$model = new InvReceivings;
                        $model->suplier_id = $_POST['InvReceivings']['suplier_id'];
                        $model->receiving_time = date("Y-m-d H:i:s");
                        $model->user = Yii::app()->user->id;
                        $model->comment = $_POST['InvReceivings']['comment'];
                        $model->item_id = 0;
                        $model->description = 0;
                        $model->qty_purchased = 0;
                        $model->item_cost_price = 0;
                        $model->item_unit_price = 0;
                        
                        
                        if($model->save()){
                            echo "------------------aqui--------------------------";
                            foreach($_POST['InvReceivingsItems'] as $data){
                                echo "////////////////aqui//////////////////// <br />";
                                $receivings=new InvReceivingsItems;
                                $receivings->receivings_id = $model->id;
                                $receivings->item_id = $data['item_id'];
                                $receivings->description = $data['description'];
                                $receivings->serialnumber = $data['serialnumber'];
                                $receivings->qty_purchased = $data['qty_purchased'];
                                $receivings->item_cost_price = $data['item_cost_price'];
                                $receivings->item_unit_price = $data['item_unit_price'];
                                $receivings->discount_percent = $data['discount_percent'];
                                $receivings->suplier_id = $_POST['InvReceivings']['suplier_id'];
                                //$receivings->save();
                                if($receivings->save()){
                                    $item_qty = InvItem::model()->findByPk($receivings->item_id);
                                    $item_qty->quantity = $receivings->qty_purchased + $item_qty->quantity;
                                    $item_qty->description = $receivings->description;
                                    $item_qty->cost_price = $receivings->item_cost_price;
                                    $item_qty->unit_price = $receivings->item_unit_price;
                                    if($item_qty->save()){
                                        Yii::app()->user->setFlash('success','Se ha guardado la recepción del item <b>'.$item_qty->name.'</b>.');
                                    }
                                }else{
                                    print_r($receivings->getErrors());
                                }
                            }
                            $this->redirect(array('invReceivings/view','id'=>$model->id));
                        }else{
                            print_r($model->getErrors());
                        }
                    /*
			$model->attributes=$_POST['InvReceivingsItems'];
                            $model->receivings_id = $receivings->id;
                            if($model->save()){
                                $item_qty = InvItem::model()->findByPk($model->item_id);
                                $item_qty->quantity = $model->qty_purchased + $item_qty->quantity;
                                $item_qty->description = $model->description;
                                $item_qty->cost_price = $model->item_cost_price;
                                $item_qty->unit_price = $model->item_unit_price;
                                if($item_qty->save()){
                                    Yii::app()->user->setFlash('success','Se ha guardado la recepción del item <b>'.$item_qty->name.'</b>.');
                                    $this->redirect(array('view','id'=>$model->id));
                                }
                            }
                        }*/
		}

		$this->render('create',array(
			'model'=>$model,
		));
                
                if(isset($_POST['InvReceivingsItems'])){
                            echo "<pre>";
                                var_dump($_POST['InvReceivingsItems']); 
                            echo "</pre>";
                            //echo $sales->item_cost_price;
                        }
                
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
                $receivings=  InvReceivings::model()->findByPk($model->receivings_id);
                $model->suplier_id = $receivings->suplier_id;
                $model->comment = $receivings->comment ;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InvReceivingsItems']))
		{
			$model->attributes=$_POST['InvReceivingsItems'];
                        $receivings=  InvReceivings::model()->findByPk($model->receivings_id);
                        $receivings->suplier_id = $model->suplier_id;
                        $receivings->comment = $model->comment;
                        if($receivings->save()){
			if($model->save()){
                            $item_qty = InvItem::model()->findByPk($model->item_id);
                            $item_qty->quantity = $model->qty_purchased + $item_qty->quantity;
                            $item_qty->description = $model->description;
                            $item_qty->cost_price = $model->item_cost_price;
                            $item_qty->unit_price = $model->item_unit_price;
                        }
                        if($item_qty->save()){
				$this->redirect(array('view','id'=>$model->id));
                        }
                        }
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
                    if($item->quantity>=$model->qty_purchased){
                        $item->quantity = $item->quantity-$model->qty_purchased;
                        if($item->save()){
                            $this->loadModel($id)->delete();
                            InvReceivings::model()->deleteByPk($model->receivings_id);
                            Yii::app()->user->setFlash('success','Se ha eliminado la recepción del item <b>'.$item->name.'</b>.');
                        }
                        else{
                            Yii::app()->user->setFlash('error','No se puede eliminar la recepción del item <b>'.$item->name.'</b> intente de nuevo mas tarde.');
                        }
                    }  else {
                        Yii::app()->user->setFlash('warning','No se puede borrar la recepción del item <b>'.$item->name.'</b> porque no hay existencias suficientes.');
                    }
			// we only allow deletion via POST request

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('invReceivings/admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('InvReceivingsItems');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new InvReceivingsItems('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['InvReceivingsItems']))
			$model->attributes=$_GET['InvReceivingsItems'];

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
		$model=InvReceivingsItems::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionSelectDescription() {
	    $res =array();
	 
	    if (isset($_GET['term'])) {
	        // http://www.yiiframework.com/doc/guide/database.dao
	        $qtxt ="SELECT description FROM inv_item WHERE description LIKE :description group by description ";
	        $command =Yii::app()->db->createCommand($qtxt);
	        $command->bindValue(":description", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	        $res =$command->queryColumn();
	    }
	 
	    echo CJSON::encode($res);
	    Yii::app()->end();
	}
        
        public function actionItemAll(){

            $list=  InvItem::model()->findAllBySql("SELECT description,unit_price,cost_price,quantity  FROM inv_item WHERE id='".$_POST["item_id"]."' ORDER BY name limit 1");
            foreach($list as $data)
                    $response = array("description"=>"{$data->description}", "unit_price"=>"$data->unit_price", "cost_price"=>"$data->cost_price", "qty"=>"$data->quantity");
                    
            echo json_encode($response);
                    
        }
        
        public function actionSerialNumber(){

            $list=  InvReceivingsItems::model()->findAllBySql("SELECT serialnumber,receivings_id  FROM inv_receivings_items WHERE serialnumber='".$_POST["serialnumber"]."'");
            foreach($list as $data)
                    $response = array("serialnumber"=>"{$data->serialnumber}","receivingsid"=>"{$data->receivings_id}");
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='inv-receivings-items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
