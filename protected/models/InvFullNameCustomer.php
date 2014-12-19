<?php

/**
 * This is the model class for table "inv_full_name_customer".
 *
 * The followings are the available columns in table 'inv_full_name_customer':
 * @property integer $id
 * @property string $name
 */
class InvFullNameCustomer extends CActiveRecord
{
    public $grand;
    public $item_id;
    public $description;
    public $qty_purchased;
    public $qty_exist;
    public $item_unit_price;
    public $comment;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inv_full_name_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('id, item_id, description, qty_purchased, item_unit_price','required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>511),
                        array('qty_exist','compare','compareAttribute'=>'qty_purchased','operator'=>'>','message'=>'Existencia debe ser Mayor a Cantidad'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Cliente',
			'name' => 'Name',
            'item_id' => 'Item',
            'description' => 'Descripción',
            'qty_purchased' => 'Cantidad',
            'item_unit_price' => 'Precio Unitario',
            'comment' => 'Comentarios',
            'grand' => 'Gran Total',
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getMenuCustomers(){
		$customers=  InvFullNameCustomer::model()->findAllBySql('SELECT id,name FROM inv_full_name_customer');
		return CHtml::listData($customers,"id","name");
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvFullNameCustomer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
