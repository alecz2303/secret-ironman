<?php

class CpForm extends CFormModel{
    
    public $estado;
    public $mnpio;
    public $col;
    public $cp;
    
        public function attributeLabels()
	{
            return array(
                'estado'=>'Estado',
                'mnpio'=>'Delegación / Municipio',
                'col'=>'Colonia',
                'cp'=>'Código Postal',
            );
        }
        
        public function getMenuEstados(){
		$estados=Codigos::model()->findAll(array('order'=>'d_estado','group'=>'d_estado'));
		return CHtml::listData($estados,"c_estado","d_estado");
	}

	public function getMenuDelMun($defaultEstado=0){
		$delmun=Codigos::model()->findAll("c_estado=?",array($defaultEstado),array('order'=>'D_mnpio','group'=>'D_mnpio'));
		return CHtml::listData($delmun,"c_mnpio","D_mnpio");
	}

	public function getMenuColonia($defaultEstado=0,$defaultMnpio=0){
		$colonia=Codigos::model()->findAllBySql("SELECT DISTINCT id_asenta_cpcons,d_asenta,d_codigo  FROM codigos WHERE c_estado='".$defaultEstado."' AND c_mnpio='".$defaultMnpio."' GROUP BY id_asenta_cpcons,d_asenta ORDER BY d_asenta");
		return CHtml::listData($colonia,"id_asenta_cpcons","coloniaCp");
	}

	public function getMenuCp($defaultEstado=0,$defaultMnpio=0,$defaultColonia=0){
		$cp=Codigos::model()->findAllBySql("SELECT id,d_codigo FROM codigos WHERE c_estado=".$defaultEstado." AND c_mnpio=".$defaultMnpio." AND id_asenta_cpcons=".$defaultColonia." GROUP BY id_asenta_cpcons, d_asenta ORDER BY d_asenta");
		return CHtml::listData($cp,"id","d_codigo");
	}
}