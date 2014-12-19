<?php

/**
 * This is the model class for table "inv_sales_items".
 *
 * The followings are the available columns in table 'inv_sales_items':
 * @property integer $id
 * @property integer $sales_id
 * @property integer $item_id
 * @property string $description
 * @property string $serialnumber
 * @property double $qty_purchased
 * @property double $item_cost_price
 * @property double $item_unit_price
 * @property integer $discount_percent
 *
 * The followings are the available model relations:
 * @property InvItem $item
 * @property InvSales $sales
 */
class InvSalesItems extends CActiveRecord
{
    public $sale_time;
    public $customer_id;
    public $user;
    public $comment;
    public $name;
    public $total;
    public $qty_exist;


    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inv_sales_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, description, qty_purchased, item_unit_price', 'required'),
			array('sales_id, item_id, discount_percent', 'numerical', 'integerOnly'=>true),
			array('qty_purchased, item_cost_price, item_unit_price', 'numerical'),
			array('serialnumber', 'length', 'max'=>30),
                        array(
                            'serialnumber', 'unique',
                            'allowEmpty' => true,
                            'attributeName' => 'serialnumber',
                            'caseSensitive'=> false,
                            'className'=>'InvSalesItems',
                            'message'=>'{attribute} "{value}" ya esta en uso.',
                        ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sales_id, item_id, description, serialnumber, qty_purchased, item_cost_price, item_unit_price, discount_percent', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'InvItem', 'item_id'),
			'sales' => array(self::BELONGS_TO, 'InvSales', 'sales_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sales_id' => 'Sales',
			'item_id' => 'Item',
			'description' => 'Descripcion',
			'serialnumber' => 'Número de Serie',
			'qty_purchased' => 'Cant.',
			'item_cost_price' => 'Precio de Costo',
			'item_unit_price' => '$ Unitario',
			'discount_percent' => '% Desc.',
                        'name' => 'Item',
                        'qty_exist' => 'Exist.',
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
	public function search($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sales_id',$this->sales_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('serialnumber',$this->serialnumber,true);
		$criteria->compare('qty_purchased',$this->qty_purchased);
		$criteria->compare('item_cost_price',$this->item_cost_price);
		$criteria->compare('item_unit_price',$this->item_unit_price);
		$criteria->compare('discount_percent',$this->discount_percent);
                $criteria->select = '*,((qty_purchased*item_unit_price)-((discount_percent*(qty_purchased*item_unit_price))/100)) AS total';
                $criteria->condition = 'sales_id = '.$id;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getMenuItems(){
		$item= InvItem::model()->findAll(array('order'=>'name'));
		return CHtml::listData($item,"id","name");
	}
        
        public function getTotal($id){
                //$ids = implode(",",$ids);          
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT (SUM((qty_purchased*item_unit_price)-((discount_percent*(qty_purchased*item_unit_price))/100))) FROM `inv_sales_items` where sales_id = $id");
                return $amount = $command->queryScalar();
        }
        
        public function getIVA($id){
                //$ids = implode(",",$ids);          
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT (SUM((qty_purchased*item_unit_price)-((discount_percent*(qty_purchased*item_unit_price))/100)))*.16 FROM `inv_sales_items` where sales_id = $id");
                return $amount = $command->queryScalar();
        }
        
        public function getTotals($id){
                //$ids = implode(",",$ids);          
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT (SUM((qty_purchased*item_unit_price)-((discount_percent*(qty_purchased*item_unit_price))/100)))*1.16 FROM `inv_sales_items` where sales_id = $id");
                return $amount = $command->queryScalar();
        }
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvSalesItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
