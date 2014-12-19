<?php

/**
 * This is the model class for table "testimonio_infonavit".
 *
 * The followings are the available columns in table 'testimonio_infonavit':
 * @property integer $id
 * @property integer $escritura
 * @property integer $anno
 * @property string $nombre
 * @property string $fecha_entrega
 * @property string $recibe
 */
class TestimonioInfonavit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'testimonio_infonavit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('escritura, anno, nombre,fecha_entrega', 'required'),
			array('escritura, anno', 'numerical', 'integerOnly'=>true),
			array('nombre, recibe', 'length', 'max'=>260),
			array('fecha_entrega', 'date', 'format'=>'yyyy-M-d'),
			array('fecha_entrega', 'safe', 'on'=>'create'),
                        array(
                            'escritura', 'unique',
                            'allowEmpty' => false,
                            'attributeName' => 'escritura',
                            'caseSensitive'=> false,
                            'className'=>'TestimonioInfonavit',
                            'message'=>'{attribute} "{value}" ya esta en uso.',
                        ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, escritura, anno, nombre, fecha_entrega, recibe', 'safe', 'on'=>'search'),
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
			'escritura' => 'Escritura',
			'anno' => 'Año',
			'nombre' => 'Nombre',
			'fecha_entrega' => 'Fecha Entrega',
			'recibe' => 'Recibe',
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
		$criteria->compare('escritura',$this->escritura);
		$criteria->compare('anno',$this->anno);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('recibe',$this->recibe,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getColor() {
        
            $statuscolor='white';
            
                    if($this->fecha_entrega!=='0000-00-00'){
                        $statuscolor='red';
                    }
                    
            
            return $statuscolor;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestimonioInfonavit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
