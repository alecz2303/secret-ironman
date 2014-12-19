<?php

/**
 * This is the model class for table "scc_expedientes".
 *
 * The followings are the available columns in table 'scc_expedientes':
 * @property integer $id
 * @property string $Fecha
 * @property integer $Expediente
 * @property string $Operacion
 * @property string $Instrumento
 * @property string $Abogado
 * @property string $Tipo
 * @property string $doc_esc
 */
class SccExpedientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'scc_expedientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Expediente', 'numerical', 'integerOnly'=>true),
			array('Fecha', 'length', 'max'=>100),
			array('Operacion', 'length', 'max'=>104),
			array('Instrumento', 'length', 'max'=>22),
			array('Abogado', 'length', 'max'=>28),
			array('Tipo', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Fecha, Expediente, Operacion, Instrumento, Abogado, Tipo, doc_esc', 'safe', 'on'=>'search'),
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
			'Operacion' => 'Operacion',
			'Instrumento' => 'Instrumento',
			'Abogado' => 'Abogado',
			'Tipo' => 'Tipo',
			'doc_esc' => 'Docs Esc',
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

		//is_file(Yii::getPathOfAlias('application').'/views/sccExpedientes/files/'.$data->Expediente.'.php')


		$criteria->compare('id',$this->id);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Expediente',$this->Expediente);
		$criteria->compare('Operacion',$this->Operacion,true);
		$criteria->compare('Instrumento',$this->Instrumento,true);
		$criteria->compare('Abogado',$this->Abogado,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('doc_esc',$this->doc_esc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SccExpedientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
