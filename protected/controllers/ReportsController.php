<?php 
	class ReportsController extends Controller {
		
		public function filters(){
			return array(
				'accessControl',
			);
		}

		public function accessRules(){
			return array(
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions' => array('pdfToner','invTot','invFalt','poStatusExp','poStatusExpTerm','poStatusExpNot','peStatusExp','peStatusExpTerm','peStatusExpNot'),
					'expression' => array('ReportsController', 'allowOnlyGroup'),
				),
				array('deny', // deny all users
					'users' => array('*'),
				),
			);
		}

		public static function allowOnlyGroup(){
            $i=0;
            if(!Yii::App()->user->isGuest){
                foreach(Yii::app()->user->adSecurityGroups as $group){
                    if($group == 'appReports' || $group == 'Administradores'){
                        $i++;
                    }
                }
                if($i>0){
                    return true;
                }
            }  
        }

        //reporte de existencias de toner
        public function actionPdfToner()
		{
			$model=new Reports();
			$this->render('pdfToner',array(
				'model'=>$model,
			));
		}

		//reporte de Inventario Total
        public function actionInvTot()
		{
			$model=new Reports();
			$this->render('invTot',array(
				'model'=>$model,
			));
		}

		//reporte de Inventario Total
        public function actionInvFalt()
		{
			$model=new Reports();
			$this->render('invFalt',array(
				'model'=>$model,
			));
		}

        public function actionPoStatusExp()
		{
			$model=new Reports();
			$this->render('poStatusExp',array(
				'model'=>$model,
			));
		}

		public function actionPoStatusExpTerm()
				{
					$model=new Reports();
					$this->render('poStatusExpTerm',array(
						'model'=>$model,
					));
				}

		public function actionPoStatusExpNot()
		{
			$model=new Reports();
			$this->render('poStatusExpNot',array(
				'model'=>$model,
			));
		}

		public function actionPeStatusExp()
		{
			$model=new Reports();
			$this->render('peStatusExp',array(
				'model'=>$model,
			));
		}

		public function actionPeStatusExpTerm()
				{
					$model=new Reports();
					$this->render('peStatusExpTerm',array(
						'model'=>$model,
					));
				}

		public function actionPeStatusExpNot()
		{
			$model=new Reports();
			$this->render('peStatusExpNot',array(
				'model'=>$model,
			));
		}

	}