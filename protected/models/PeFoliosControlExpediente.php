<?php

/**
 * This is the model class for table "pe_folios_control_expediente".
 *
 * The followings are the available columns in table 'pe_folios_control_expediente':
 * @property integer $id
 * @property string $ep
 * @property string $folio_ini
 * @property string $folio_fin
 * @property string $fecha
 * @property string $acto
 * @property string $enajenante
 * @property string $adquirente
 * @property string $responsable
 * @property string $expediente_DBA
 * @property string $fecha_Registro
 * @property string $canc
 * @property string $libro
 */
class PeFoliosControlExpediente extends CActiveRecord
{
    public $foliosxusar;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pe_folios_control_expediente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ep, foliosxusar, folio_ini, folio_fin, fecha, acto, libro, expediente_DBA', 'required'),
			array('ep', 'length', 'max'=>15),
			array('folio_ini, folio_fin, expediente_DBA', 'length', 'max'=>7),
                        array('foliosxusar, folio_ini, folio_fin, libro', 'numerical', 'integerOnly'=>true),
			array('acto, enajenante, adquirente', 'length', 'max'=>500),
			array('responsable', 'length', 'max'=>20),
			array('canc', 'length', 'max'=>2),
			array('libro', 'length', 'max'=>6),
                        array(
                            'ep', 'unique',
                            'allowEmpty' => false,
                            'attributeName' => 'ep',
                            'caseSensitive'=> false,
                            'className'=>'PeFoliosControlExpediente',
                            'message'=>'{attribute} "{value}" ya esta en uso.',
                        ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ep, folio_ini, folio_fin, fecha, acto, enajenante, adquirente, responsable, expediente_DBA, fecha_Registro, canc, libro', 'safe', 'on'=>'search'),
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
			'ep' => 'Escritura Pública',
			'folio_ini' => 'Folio Inicial',
			'folio_fin' => 'Folio Final',
			'fecha' => 'Fecha',
			'acto' => 'Acto',
			'enajenante' => 'Enajenante',
			'adquirente' => 'Adquirente',
			'responsable' => 'Responsable',
			'expediente_DBA' => 'Expediente Dba',
			'fecha_Registro' => 'Fecha Ult. Mod.',
			'canc' => 'Cancelado',
			'libro' => 'Libro',
                        'foliosxusar' => 'Folios Usados',
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
		$criteria->compare('ep',$this->ep,true);
		$criteria->compare('folio_ini',$this->folio_ini,true);
		$criteria->compare('folio_fin',$this->folio_fin,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('acto',$this->acto,true);
		$criteria->compare('enajenante',$this->enajenante,true);
		$criteria->compare('adquirente',$this->adquirente,true);
		$criteria->compare('responsable',$this->responsable,true);
		$criteria->compare('expediente_DBA',$this->expediente_DBA,true);
		$criteria->compare('fecha_Registro',$this->fecha_Registro,true);
		$criteria->compare('canc',$this->canc,true);
		$criteria->compare('libro',$this->libro,true);
                $criteria->order = 'folio_ini DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PoFoliosControlExpediente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getColor() {
        
        $statuscolor='white';
            switch ($this->canc) {
                case 'NO':
                    $statuscolor='green';
                    break;
                case 'SI':
                    if(substr($this->ep,0,1)==='F'){
                        $statuscolor='red';
                    }else{
                        $statuscolor='yellow';
                    }
                    break;    
            }
            
        return $statuscolor;
        }
}
