<?php

/**
 * This is the model class for table "inv_item".
 *
 * The followings are the available columns in table 'inv_item':
 * @property integer $id
 * @property string $name
 * @property string $category
 * @property integer $supplier_id
 * @property string $description
 * @property double $cost_price
 * @property double $unit_price
 * @property double $quantity
 * @property double $reorder_level
 * @property integer $deleted
 *
 * The followings are the available model relations:
 * @property InvInventory[] $invInventories
 * @property InvReceivingsItems[] $invReceivingsItems
 * @property InvSalesItems[] $invSalesItems
 */
class InvItem extends CActiveRecord {
	public $company_name;
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'inv_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category, supplier_id, description, cost_price, unit_price, reorder_level', 'required'),
			array('supplier_id, deleted', 'numerical', 'integerOnly' => true),
			array('cost_price, unit_price, quantity, reorder_level', 'numerical'),
			array('name, category, description', 'length', 'max' => 255),
			array(
				'name', 'unique',
				'allowEmpty'    => false,
				'attributeName' => 'name',
				'caseSensitive' => false,
				'className'     => 'InvItem',
				'message'       => '{attribute} "{value}" ya esta en uso.',
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, category, supplier_id, description, cost_price, unit_price, quantity, reorder_level, deleted', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'invSuppliers' => array(self::BELONGS_TO, 'InvSuppliers', 'supplier_id'),
			'invInventories' => array(self::HAS_MANY, 'InvInventory', 'item_id'),
			'invReceivingsItems' => array(self::HAS_MANY, 'InvReceivingsItems', 'item_id'),
			'invSalesItems' => array(self::HAS_MANY, 'InvSalesItems', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id'            => 'ID',
			'name'          => 'Nombre',
			'category'      => 'Categoria',
			'supplier_id'   => 'Proveedor',
			'description'   => 'Descripción',
			'cost_price'    => 'Precio de Costo',
			'unit_price'    => 'Precio de Venta',
			'quantity'      => 'Cantidad',
			'reorder_level' => 'Nivel de Reorden',
			'deleted'       => 'Borrado',
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
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('category', $this->category, true);
		$criteria->compare('supplier_id', $this->supplier_id);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('cost_price', $this->cost_price);
		$criteria->compare('unit_price', $this->unit_price);
		$criteria->compare('quantity', $this->quantity);
		$criteria->compare('reorder_level', $this->reorder_level);
		$criteria->compare('deleted', $this->deleted);
		$criteria->with = array('invSuppliers');
		$criteria->compare('invSuppliers.company_name', $this->company_name, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				'sort'     => array(
					'attributes' => array(
						'company_name' => array(
							'asc'  => 'invSuppliers.company_name',
							'desc' => 'invSuppliers.company_name DESC',
						),
						'*',
					),
				),
			));
	}

	public function getMenuSuppliers() {
		$suppliers = InvSuppliers::model()->findAll(array('order' => 'company_name'));
		return CHtml::listData($suppliers, "id", "company_name");
	}

	public function getMenuCategory() {
		$category = InvItem::model()->findAll(array('order' => 'category', 'group' => 'category'));
		return CHtml::listData($category, "category", "category");
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvItem the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
