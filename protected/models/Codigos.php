<?php

/**
 * This is the model class for table "codigos".
 *
 * The followings are the available columns in table 'codigos':
 * @property string $d_codigo
 * @property string $d_asenta
 * @property string $d_tipo_asenta
 * @property string $D_mnpio
 * @property string $d_estado
 * @property string $d_ciudad
 * @property string $d_CP
 * @property string $c_estado
 * @property string $c_oficina
 * @property string $c_CP
 * @property string $c_tipo_asenta
 * @property string $c_mnpio
 * @property string $id_asenta_cpcons
 * @property string $d_zona
 * @property string $c_cve_ciudad
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 */
class Codigos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'codigos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('d_codigo, d_asenta, d_tipo_asenta, D_mnpio, d_estado, d_ciudad, d_CP, c_estado, c_oficina, c_CP, c_tipo_asenta, c_mnpio, id_asenta_cpcons, d_zona, c_cve_ciudad', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('d_codigo, d_asenta, d_tipo_asenta, D_mnpio, d_estado, d_ciudad, d_CP, c_estado, c_oficina, c_CP, c_tipo_asenta, c_mnpio, id_asenta_cpcons, d_zona, c_cve_ciudad, id', 'safe', 'on'=>'search'),
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
			'people' => array(self::HAS_MANY, 'InvPeople', 'cp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'd_codigo' => 'Código Postal',
			'd_asenta' => 'Colónia',
			'd_tipo_asenta' => 'D Tipo Asenta',
			'D_mnpio' => 'Delegación/Municipio',
			'd_estado' => 'Estado',
			'd_ciudad' => 'D Ciudad',
			'd_CP' => 'D Cp',
			'c_estado' => 'C Estado',
			'c_oficina' => 'C Oficina',
			'c_CP' => 'C Cp',
			'c_tipo_asenta' => 'C Tipo Asenta',
			'c_mnpio' => 'C Mnpio',
			'id_asenta_cpcons' => 'Id Asenta Cpcons',
			'd_zona' => 'D Zona',
			'c_cve_ciudad' => 'C Cve Ciudad',
			'id' => 'ID',
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

		$criteria->compare('d_codigo',$this->d_codigo,true);
		$criteria->compare('d_asenta',$this->d_asenta,true);
		$criteria->compare('d_tipo_asenta',$this->d_tipo_asenta,true);
		$criteria->compare('D_mnpio',$this->D_mnpio,true);
		$criteria->compare('d_estado',$this->d_estado,true);
		$criteria->compare('d_ciudad',$this->d_ciudad,true);
		$criteria->compare('d_CP',$this->d_CP,true);
		$criteria->compare('c_estado',$this->c_estado,true);
		$criteria->compare('c_oficina',$this->c_oficina,true);
		$criteria->compare('c_CP',$this->c_CP,true);
		$criteria->compare('c_tipo_asenta',$this->c_tipo_asenta,true);
		$criteria->compare('c_mnpio',$this->c_mnpio,true);
		$criteria->compare('id_asenta_cpcons',$this->id_asenta_cpcons,true);
		$criteria->compare('d_zona',$this->d_zona,true);
		$criteria->compare('c_cve_ciudad',$this->c_cve_ciudad,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getColoniaCp(){
            return $this->d_codigo.' | '.$this->d_asenta;
        }

        /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Codigos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
