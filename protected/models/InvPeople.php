<?php

/**
 * This is the model class for table "inv_people".
 *
 * The followings are the available columns in table 'inv_people':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property integer $estado
 * @property integer $mnpio
 * @property integer $col
 * @property integer $cp
 * @property string $comments
 *
 * The followings are the available model relations:
 * @property InvCustomers[] $invCustomers
 * @property InvSuppliers[] $invSuppliers
 */
class InvPeople extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inv_people';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, phone_number, email, estado, mnpio, col, cp', 'required'),
			array('estado, mnpio, col, cp', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, phone_number, email, address1, address2', 'length', 'max'=>255),
			array('comments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, phone_number, email, address1, address2, estado, mnpio, col, cp, comments', 'safe', 'on'=>'search'),
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
                        'codigos'=>array(self::BELONGS_TO,'Codigos','cp'),
			'invCustomers' => array(self::HAS_MANY, 'InvCustomers', 'people_id'),
			'invSuppliers' => array(self::HAS_MANY, 'InvSuppliers', 'people_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'Nombre',
			'last_name' => 'Apellidos',
			'phone_number' => 'Teléfono',
			'email' => 'Correo Electrónico',
			'address1' => 'Dirección 1',
			'address2' => 'Dirección 2',
			'estado' => 'Estado',
			'mnpio' => 'Del / Mpio',
			'col' => 'Colónia',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('mnpio',$this->mnpio);
		$criteria->compare('col',$this->col);
		$criteria->compare('cp',$this->cp);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getConcatened(){
            return $this->first_name.' '.$this->last_name;
        } 
        

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvPeople the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
