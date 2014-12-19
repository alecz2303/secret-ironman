<?php

/**
 * This is the model class for table "inv_suppliers".
 *
 * The followings are the available columns in table 'inv_suppliers':
 * @property integer $id
 * @property integer $people_id
 * @property string $company_name
 * @property integer $deleted
 *
 * The followings are the available model relations:
 * @property InvReceivings[] $invReceivings
 * @property InvPeople $people
 */
class InvSuppliers extends CActiveRecord
{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $address1;
    public $address2;
    public $estado;
    public $mnpio;
    public $col;
    public $cp;
    public $comments;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inv_suppliers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_name, first_name, last_name, phone_number, email, address1, estado, mnpio, col, cp', 'required'),
			array('people_id, deleted, estado, mnpio, col, cp', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>255),
                        array('email','email'),
                        array('address2, comments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, people_id, company_name, deleted', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'invReceivings' => array(self::HAS_MANY, 'InvReceivings', 'suplier_id'),
			'people' => array(self::BELONGS_TO, 'InvPeople', 'people_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'people_id' => 'People',
			'company_name' => 'Nombre de la Compañia',
			'deleted' => 'Deleted',
                        'first_name' => 'Nombre',
                        'last_name' => 'Apellidos',
                        'phone_number'=> 'Teléfono',
                        'email' => 'Correo Electrónico',
                        'address1' => 'Dirección1',
                        'address2' => 'Direccion2',
                        'estado' => 'Estado',
                        'mnpio' => 'Del / Mpio',
                        'col' => 'Colonia',
                        'cp' => 'Código Postal',
                        'comments' => 'Comentarios',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('people_id',$this->people_id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('deleted',$this->deleted);
                $criteria->with = array('people');
                $criteria->compare('people.first_name',$this->first_name,true);
                $criteria->compare('people.last_name',  $this->last_name,true);
                $criteria->compare('people.phone_number',  $this->phone_number,true);
                $criteria->compare('people.email',$this->email,true);
                $criteria->compare('people.address1',$this->address1,true);
                $criteria->compare('people.addres2',$this->address2,true);
                $criteria->compare('people.estado',$this->estado,true);
                $criteria->compare('people.mnpio',$this->mnpio,true);
                $criteria->compare('people.col',$this->col,true);
                $criteria->compare('people.cp',$this->cp,true);
                $criteria->compare('people.comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                            'sort'=>array(
                                'attributes'=>array(
                                    'first_name'=>array(
                                        'asc'=>'people.first_name',
                                        'desc'=>'people.first_name DESC',
                                    ),
                                    'last_name'=>array(
                                        'asc'=>'people.last_name',
                                        'desc'=>'people.last_name DESC',
                                    ),
                                    'phone_number'=>array(
                                        'asc'=>'people.phone_number',
                                        'desc'=>'people.phone_number DESC',
                                    ),
                                    'email'=>array(
                                        'asc'=>'people.email',
                                        'desc'=>'people.email DESC',
                                    ),
                                    'address1'=>array(
                                        'asc'=>'people.address1',
                                        'desc'=>'people.address1 DESC',
                                    ),
                                    'address2'=>array(
                                        'asc'=>'people.address2',
                                        'desc'=>'people.address2 DESC',
                                    ),
                                    'estado'=>array(
                                        'asc'=>'people.estado',
                                        'desc'=>'people.estado DESC',
                                    ),
                                    'mnpio'=>array(
                                        'asc'=>'people.mnpio',
                                        'desc'=>'people.mnpio DESC',
                                    ),
                                    'col'=>array(
                                        'asc'=>'people.col',
                                        'desc'=>'people.col DESC',
                                    ),
                                    'cp'=>array(
                                        'asc'=>'people.cp',
                                        'desc'=>'people.cp DESC',
                                    ),
                                    'comments'=>array(
                                        'asc'=>'people.comments',
                                        'desc'=>'people.comments DESC',
                                    ),
                                    '*',
                                ),
                            ),
		));
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
        
        public function getSelectName(){
            return $this->company_name.' | '.$this->first_name.' '.$this->last_name;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvSuppliers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
