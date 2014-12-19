<?php

/**
 * This is the model class for table "expedientes".
 *
 * The followings are the available columns in table 'expedientes':
 * @property integer $id
 * @property string $Fecha
 * @property string $Expediente
 * @property string $Tipo
 * @property string $Operacion
 * @property string $Instrumento
 * @property string $Abogado
 * @property string $Cliente
 * @property string $Solicita
 */
class Expedientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'expedientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Fecha', 'length', 'max'=>10),
			array('Expediente', 'length', 'max'=>7),
			array('Tipo', 'length', 'max'=>9),
			array('Operacion', 'length', 'max'=>173),
			array('Instrumento', 'length', 'max'=>22),
			array('Abogado', 'length', 'max'=>31),
			array('Cliente', 'length', 'max'=>84),
			array('Solicita', 'length', 'max'=>110),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Fecha, Expediente, Tipo, Operacion, Instrumento, Abogado, Cliente, Solicita', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'Fecha' => 'Fecha',
			'Expediente' => 'Expediente',
			'Tipo' => 'Tipo',
			'Operacion' => 'Operacion',
			'Instrumento' => 'Instrumento',
			'Abogado' => 'Abogado',
			'Cliente' => 'Cliente',
			'Solicita' => 'Solicita',
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
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Expediente',$this->Expediente,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('Operacion',$this->Operacion,true);
		$criteria->compare('Instrumento',$this->Instrumento,true);
		$criteria->compare('Abogado',$this->Abogado,true);
		$criteria->compare('Cliente',$this->Cliente,true);
		$criteria->compare('Solicita',$this->Solicita,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Expedientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
