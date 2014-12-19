<?php

/**
 * This is the model class for table "po_status_exp".
 *
 * The followings are the available columns in table 'po_status_exp':
 * @property integer $id
 * @property string $eps
 * @property string $lugar
 * @property string $sr
 * @property string $clg
 * @property string $clg_fecha
 * @property string $clg_volante
 * @property string $sap
 * @property string $sap_fecha
 * @property string $sap_volante
 * @property string $itd
 * @property string $notas
 * @property integer $apendice
 * @property integer $declaranot
 * @property integer $legajo
 * @property string $rpp
 * @property string $rpp_volante
 * @property string $delegacion
 * @property integer $nc
 * @property string $r_rpp
 * @property string $sr_salida
 * @property string $clg_salida
 * @property string $clg_salida_fecha
 * @property string $clg_salida_volante
 * @property string $entregado
 * @property string $status
 * @property integer $terminada
 * @property integer $tipo
 *
 * The followings are the available model relations:
 * @property PoFoliosControlExpediente $ep0
 */
class PoStatusExp extends CActiveRecord {
	public $expediente_DBA_search;
	public $libro_search;
	public $folio_ini_search;
	public $folio_fin_search;
	public $fecha_search;
	public $enajenante_search;
	public $adquirente_search;
	public $acto_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'po_status_exp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eps, lugar, tipo', 'required'),
			array(
				'eps', 'unique',
				'allowEmpty'    => false,
				'attributeName' => 'eps',
				'caseSensitive' => false,
				'className'     => 'PoStatusExp',
				'message'       => '{attribute} "{value}" ya esta en uso.',
			),
			array('apendice, declaranot, legajo, sr_salida, clg_salida, nc, terminada', 'numerical', 'integerOnly' => true),
			array('eps', 'length', 'max' => 15),
			array('lugar', 'length', 'max' => 100),
			array('sr, clg, clg_volante, sap, sap_volante, rpp_volante', 'length', 'max' => 45),
			array('clg_fecha, sap_fecha, itd, notas, rpp, r_rpp, status, delegacion, clg_salida_fecha, clg_salida_volante, entregada', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, eps, lugar, tipo, sr, clg, clg_fecha, clg_volante, sap, sap_fecha, sap_volante, itd, notas, apendice, declaranot, rpp, rpp_volante, nc, r_rpp, status, terminada, expediente_DBA_search, libro_search, folio_ini_search, folio_fin_search, fecha_search, enajenante_search, adquirente_search, acto_search', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ep0' => array(self::BELONGS_TO, 'PoFoliosControlExpediente', 'eps'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id'                    => 'ID',
			'eps'                   => 'Ep',
			'lugar'                 => 'Lugar',
			'sr'                    => 'S.Recursos',
			'clg'                   => 'CLG',
			'clg_fecha'             => 'CLG Fecha',
			'clg_volante'           => 'CLG Volante',
			'sap'                   => 'Segundo Aviso P.',
			'sap_fecha'             => 'Segundo Aviso P. Fecha',
			'sap_volante'           => 'Segundo Aviso P. Volante',
			'itd'                   => 'ITD',
			'notas'                 => 'Notas',
			'apendice'              => 'Apendice',
			'declaranot'            => 'Declaranot',
			'legajo'				=> 'Legajo',
			'rpp'                   => 'RPP',
			'rpp_volante'           => 'RPP Volante',
			'delegacion'			=> 'Delegación',
			'nc'                    => 'Nota comp.',
			'r_rpp'                 => 'Regreso RPP',
			'sr_salida'				=> 'S.Recursos Salida',
			'clg_salida'			=> 'CLG Salida',
			'clg_salida_fecha'		=> 'CLG Salida Fecha',
			'clg_salida_volante'	=> 'CLG Salida Volante',
			'entregada'				=> 'Fecha Entrega Cte.',
			'status'                => 'Status',
			'terminada'             => 'Terminada',
			'expediente_DBA_search' => 'Expediente DBA',
			'libro_search'          => 'Libro',
			'folio_ini_search'      => 'Folio Inicial',
			'folio_fin_search'      => 'Folio Final',
			'fecha_search'          => 'Fecha de Firma',
			'enajenante_search'     => 'Enajenante',
			'adquirente_search'     => 'Adquirente',
			'acto_search'           => 'Acto',
			'tipo'					=> 'Tipo',
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
		$criteria->compare('eps', $this->eps, true);
		$criteria->compare('lugar', $this->lugar, true);
		$criteria->compare('sr', $this->sr, true);
		$criteria->compare('clg', $this->clg, true);
		$criteria->compare('clg_fecha', $this->clg_fecha, true);
		$criteria->compare('clg_volante', $this->clg_volante, true);
		$criteria->compare('sap', $this->sap, true);
		$criteria->compare('sap_fecha', $this->sap_fecha, true);
		$criteria->compare('sap_volante', $this->sap_volante, true);
		$criteria->compare('itd', $this->itd, true);
		$criteria->compare('notas', $this->notas, true);
		$criteria->compare('apendice', $this->apendice);
		$criteria->compare('declaranot', $this->declaranot);
		$criteria->compare('legajo', $this->legajo);
		$criteria->compare('rpp', $this->rpp, true);
		$criteria->compare('rpp_volante', $this->rpp_volante, true);
		$criteria->compare('delegacion', $this->delegacion, true);
		$criteria->compare('nc', $this->nc);
		$criteria->compare('r_rpp', $this->r_rpp, true);
		$criteria->compare('sr_salida', $this->sr_salida);
		$criteria->compare('clg_salida', $this->clg_salida, true);
		$criteria->compare('clg_salida_fecha', $this->clg_salida_fecha, true);
		$criteria->compare('clg_salida_volante', $this->clg_salida_volante, true);
		$criteria->compare('entregada', $this->entregada, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('terminada', $this->terminada, true);
		$criteria->compare('tipo', $this->tipo, true);
		$criteria->with = array('ep0');
		$criteria->compare('ep0.expediente_DBA', $this->expediente_DBA_search, true);
		$criteria->compare('ep0.libro', $this->libro_search, true);
		$criteria->compare('ep0.folio_ini', $this->folio_ini_search, true);
		$criteria->compare('ep0.folio_fin', $this->folio_fin_search, true);
		$criteria->compare('ep0.fecha', $this->fecha_search, true);
		$criteria->compare('ep0.enajenante', $this->enajenante_search, true);
		$criteria->compare('ep0.adquirente', $this->adquirente_search, true);
		$criteria->compare('ep0.acto', $this->acto_search, true);
		//$criteria->condition = 	'terminada = 0';

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				'sort'     => array(
					'attributes' => array(
						'expediente_DBA_search' => array(
							'asc'  => 'ep0.expediente_DBA',
							'desc' => 'ep0.expediente_DBA DESC',
						),
						'libro_search' => array(
							'asc'  => 'ep0.libro',
							'desc' => 'ep0.libro DESC',
						),
						'folio_ini_search' => array(
							'asc'  => 'ep0.folio_ini',
							'desc' => 'ep0.folio_ini DESC',
						),
						'folio_fin_search' => array(
							'asc'  => 'ep0.folio_fin',
							'desc' => 'ep0.folio_fin DESC',
						),
						'fecha_search' => array(
							'asc'  => 'ep0.fecha',
							'desc' => 'ep0.fecha DESC',
						),
						'enajenante_search' => array(
							'asc'  => 'ep0.enajenante',
							'desc' => 'ep0.enajenante DESC',
						),
						'adquirente_search' => array(
							'asc'  => 'ep0.adquirente',
							'desc' => 'ep0.adquirente DESC',
						),
						'acto_search' => array(
							'asc'  => 'ep0.acto',
							'desc' => 'ep0.acto DESC',
						),
						'*',
					),
				),
			));
	}

	public function getMenuEp() {
		$criteria        = new CDbCriteria;
		$criteria->condition = 'ep NOT LIKE "F%"';
		$criteria->order = 'ep desc';
		$ep              = PoFoliosControlExpediente::model()->findAll($criteria);
		return CHtml::listData($ep, 'ep', 'ep');
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PoStatusExp the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}